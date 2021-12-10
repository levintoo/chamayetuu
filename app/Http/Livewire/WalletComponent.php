<?php

namespace App\Http\Livewire;

use App\Models\Savings;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WalletComponent extends Component
{
    public $mpesaamount;

    public function mount()
    {
        //
    }

    public function store()
    {
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
