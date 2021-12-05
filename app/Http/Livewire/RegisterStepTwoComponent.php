<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterStepTwoComponent extends Component
{
    public function render()
    {
        if(Auth::user()->status>0)
        {
            return redirect()->route('dashboard');
        }
        return view('livewire.register-step-two-component')->layout('layouts.guest');
    }
}
