<?php

namespace App\Http\Livewire;

use App\Models\Savings;
use App\Models\TransactionsModel;
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
        $this->paypalamount = '100';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'mpesaamount' => 'required|gt:99',
        ]);
    }

    public function store()
    {
        $this->validate([
            'mpesaamount' => 'required|gt:99',
        ]);

//  initiate mpesa transaction

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

    public function create()
    {
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
            ->setPrice(1);


        $itemList = new ItemList();
        $itemList->setItems([$item1]);

        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(1);

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(1)
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

        dd($result);
        //save to transaction table
        //save to saving table
    }
    public function initiatepaypal()
    {
        session()->flash('paypalmessage', "Saved succesfully");
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
