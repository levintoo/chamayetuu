<?php

namespace App\Http\Livewire;

use App\Models\Savings;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WalletComponent extends Component
{
    public $mpesaamount;
    public $paypalamount;

    public function mount()
    {
        //
    }

    public function resetmpesaInput()
    {
        $this->mpesaamount = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'mpesaamount' => 'required|gt:10',
        ]);
    }


    public function store()
    {
        $this->validate([
            'mpesaamount' => 'required|gt:10',
        ]);

//  initiate mpesa transaction

        $newsaving = new Savings();
        $newsaving->balance = $this->mpesaamount;
        $newsaving->user_id = Auth::user()->user_id;
        $newsaving->save();
        session()->flash('mpesamessage', "Saved succesfully");
        $this->resetmpesaInput();
    }


    public function initiatepaypal()
    {
        session()->flash('paypalmessage', "Saved succesfully");
    }


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
