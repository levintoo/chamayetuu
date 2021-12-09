<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterStepTwoComponent extends Component
{
    public function mount()
    {
        if(Auth::user()->status>0)
        {
            return redirect()->route('dashboard');
        }
    }
    public function verifyuser()
    {
        dd(Auth::user()->name);
        $user = User::where('userid',Auth::user()->userid)->first();
        $user->status = 1;
        $user->save();
        session()->flash('message',"Saved successfully" );
        return redirect()->route('dashboard');
}
    public function render()
    {
        return view('livewire.register-step-two-component')->layout('layouts.guest');
    }
}
