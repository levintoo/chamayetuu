<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WalletComponent extends Component
{
    public function render()
    {
        return view('livewire.wallet-component')->layout('layouts.dashboard');
    }
}
