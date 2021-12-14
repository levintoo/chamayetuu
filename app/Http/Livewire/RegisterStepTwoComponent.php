<?php

namespace App\Http\Livewire;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterStepTwoComponent extends Component
{
    public $otp;
    public function mount()
    {
        if(Auth::user()->status>0)
        {
            return redirect()->route('dashboard');
        }
    }
    public function verifyuser()
    {
        $otpresponse = Otp::validate(  Auth::user()->user_id, 78346);
        session()->flash('status',$otpresponse->message );
}
    public function resendcode()
    {
        Otp::generate(Auth::user()->user_id, $digits = 4, $validity = 10);
        session()->flash('status',"Code sent successfully");
    }
    public function render()
    {
        return view('livewire.register-step-two-component')->layout('layouts.guest');
    }
}
