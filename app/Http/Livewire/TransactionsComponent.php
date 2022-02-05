<?php

namespace App\Http\Livewire;

use App\Models\TransactionsModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class TransactionsComponent extends Component
{
    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 5;
    }

    public function render()
    {
        if ($this->sorting == 'date') {
            $transactions = TransactionsModel::where('user_id', Auth::user()->user_id)->orderBy('transacted_at', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'amount') {
            $transactions = TransactionsModel::where('user_id', Auth::user()->user_id)->orderBy('amount', 'DESC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'status') {
            $transactions = TransactionsModel::where('user_id', Auth::user()->user_id)->orderBy('status', 'DESC')->paginate($this->pagesize);
        } else {
            $transactions = TransactionsModel::where('user_id', Auth::user()->user_id)->orderBy('transacted_at', 'DESC')->paginate($this->pagesize);
        }
        $transactionrecords = [
            'all' => TransactionsModel::where('user_id', Auth::user()->user_id)->count(),
            'paid' => TransactionsModel::where([['user_id', Auth::user()->user_id], ['status', '1']])->count(),
            'unpaid' => TransactionsModel::where([['user_id', Auth::user()->user_id], ['status', '0']])->count(),
            'canceled' => TransactionsModel::where([['user_id', Auth::user()->user_id], ['status', '3']])->count()
        ];

        return view('livewire.transactions-component', ['transactions' => $transactions,'transactionrecords'=>$transactionrecords])->layout('layouts.dashboard');
    }
}
