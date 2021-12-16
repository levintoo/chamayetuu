<?php

namespace App\Http\Livewire;

use App\Mail\OtpMail;
use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class RegisterStepTwoComponent extends Component
{
    public $otp_input;

    public function mount()
    {
        if (Auth::user()->status > 0) {
            abort(403);
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'otp_input' => 'required|numeric',
        ]);
    }

    public function verifyuser()
    {
        $this->validate([
            'otp_input' => 'required|numeric',
        ]);

        $otpresponse = Otp::validate(Auth::user()->user_id, $this->otp_input);
        User::where('user_id', Auth::user()->user_id)->first()->update([
            'status' => "1",
        ]);
        session()->flash('status', $otpresponse->message);
        return redirect(route('dashboard'));
    }

    public function resendcode()
    {
        $newotp = Otp::generate(Auth::user()->user_id, $digits = 4, $validity = 10);
            session()->flash('status', "New otp has been sent $newotp->token");
            Mail::to(Auth::user()->email)->send(new OtpMail($newotp->token, Auth::user()->name));

    }

    public function render()
    {
        return view('livewire.register-step-two-component')->layout('layouts.guest');
    }
}
