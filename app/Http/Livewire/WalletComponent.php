<?php

namespace App\Http\Livewire;

use App\Models\Savings;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WalletComponent extends Component
{
    public $amount;

    public function mount()
    {
        //
    }

    public function resetmpesaInput()
    {
        $this->mpesaamount = '';
    }


    public function store()
    {
        $newsaving= new Savings();
        $newsaving->balance = $this->mpesaamount;
        $newsaving->user_id = Auth::user()->user_id;
        $newsaving->save();
        session()->flash('mpesamessage',"Saved succesfully" );
        $this->resetmpesaInput();
    }



    public function render()
    {
        $saving = Savings::where('user_id',Auth::user()->user_id)->first();
        $balance= number_format($saving->balance, 0, '.', ',');
        return view('livewire.wallet-component',['saving'=>$saving,'balance'=>$balance])->layout('layouts.dashboard');
    }
}
