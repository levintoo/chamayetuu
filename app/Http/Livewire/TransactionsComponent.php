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
        $transactions = TransactionsModel::where('user_id',Auth::user()->user_id)->orderBy('transacted_at','DESC')->paginate($this->pagesize);
        return view('livewire.transactions-component',['transactons'=>$transactions])->layout('layouts.dashboard');
    }
}
