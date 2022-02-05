<?php

namespace App\Http\Livewire;

use App\Models\Savings;
use App\Models\TransactionsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class WalletComponent extends Component
{
    public $mpesaamount;
    public $paypalamount;

    public function mount()
    {
        //
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'mpesaamount' => 'required|numeric|gt:99',
            'paypalamount' => 'required|numeric|gt:99',
        ]);
    }

    public function store()
    {
        $this->validate([
            'mpesaamount' => 'required|numeric|gt:99',
        ]);

        // initiate mpesa transaction

        $newsaving = new Savings();
        $newsaving->balance = $this->mpesaamount;
        $newsaving->user_id = Auth::user()->user_id;
        $newsaving->save();
        session()->flash('mpesamessage', "Saved succesfully");
        $this->resetmpesaInput();
    }

    public function resetmpesaInput()
    {
        $this->mpesaamount = '';
    }

    public function resetpaypalInput()
    {
        $this->paypalamount = '';
    }

    public function create(Request $request)
    {
        $request->validate([
            'paypalamount' => 'required|numeric|gt:99',
        ]);

        $pamount = $request->paypalamount/100;

        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AY9Yzxqy9fUL9Tq0WiDR5iQlLzW-EqNRoKTYvxHX18RuboMi_81kMm7hGSRJqQj3qyaHpdv8KvQX0gyA', // client id
                'EPPlZD25F_6nHtxSjPHp7BFwX0ohZxSSfPNdeItGhby909PDx2bYHWFGjpbZ2R6sVAj6sSyXshNDj-CU' // client secret
            )
        );

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item1 = new Item();
        $item1->setName('Pay to account ')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku(Auth::user()->user_id) // Similar to `item_number` in Classic API
            ->setPrice($pamount);


        $itemList = new ItemList();
        $itemList->setItems([$item1]);

        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($pamount);

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($pamount)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Payment description')
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl('http://127.0.0.1:8000/execute-payment')
            ->setCancelUrl('http://127.0.0.1:8000/cancel');

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        $retu = $payment->create($apiContext);

        //conversions
        $pusd_amount = $retu->transactions[0]->amount->total;
        $p_amount = $pusd_amount * 100;
        $date = date('Y-m-d H:i:s', strtotime($retu->create_time));
        //end of conversions

        $transaction = new TransactionsModel();
        $transaction->user_id = Auth::user()->user_id;
        $transaction->type = 'credit';
        $transaction->amount = $p_amount;
        $transaction->purpose = 'saving';
        $transaction->source = 'paypal';
        $transaction->transaction_id = $retu->id;
        $transaction->initiated_at = $date;
        $transaction->transacted_at = $date;
        $transaction->status = '0';
        $transaction->touch();
        $transaction->save();

        return redirect($payment->getApprovalLink());
    }

    public function execute()
    {

        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AY9Yzxqy9fUL9Tq0WiDR5iQlLzW-EqNRoKTYvxHX18RuboMi_81kMm7hGSRJqQj3qyaHpdv8KvQX0gyA', // client id
                'EPPlZD25F_6nHtxSjPHp7BFwX0ohZxSSfPNdeItGhby909PDx2bYHWFGjpbZ2R6sVAj6sSyXshNDj-CU' // client secret
            )
        );

        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(1);

        $amount->setCurrency('USD');
        $amount->setTotal(1);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $apiContext);

        $complete_transaction = TransactionsModel::where('transaction_id', $result->id)->first();
        $complete_transaction->transacted_at = date('Y-m-d H:i:s', strtotime($result->update_time));
        session()->flash('paypalmessage', "payment processed succesfully");

        if ($result->transactions[0]->related_resources[0]->sale->state === 'completed') {
            $complete_transaction->status = '1';
            $this->initiatepaypal($result);
        } else if ($result->state === 'approved') {
            $complete_transaction->status = '1';
            $this->initiatepaypal($result);
        } else if (!$result->failed_transactions = 'null') {
            $complete_transaction->status = '2';
            session()->flash('paypalmessage', "transaction failed");
        }
        $complete_transaction->touch();
        $complete_transaction->save();
        // call function to update balance
        return redirect(route('wallet'));
    }

    public function initiatepaypal($result)
    {
        $saving = Savings::where('user_id', Auth::user()->user_id)->first();
        $oldbalance = $saving->balance;
        $saving->balance = $oldbalance + 100;
        $saving->save();
        session()->flash('paypalmessage', "ona huyuu");
    }

    //render with savings info
    public function render()
    {
        $saving = Savings::where('user_id', Auth::user()->user_id)->first();
        if ($saving === null) {
            $newsaving = new Savings();
            $newsaving->balance = '0';
            $newsaving->user_id = Auth::user()->user_id;
            $newsaving->save();
            $saving = $newsaving;
            $balance = '0';
        } else {
            $balance = number_format($saving->balance, 0, '.', ',');
        }
        return view('livewire.wallet-component', ['saving' => $saving, 'balance' => $balance])->layout('layouts.dashboard');
    }
}
