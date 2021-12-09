<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TransactionsComponent extends Component
{
    public function render()
    {
        return view('livewire.transactions-component')->layout('layouts.dashboard');
    }
}
