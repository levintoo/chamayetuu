<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\Helper;
use App\Mail\AdminDetailsMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class RegisterNewAdminComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $national_id;
    public $residence;
    public $dob;

    public function render()
    {
        return view('livewire.admin.register-new-admin-component')->layout('layouts.dashboard');
    }

    public function registerAdmin(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'national_id' => ['required','unique:users'],
            'residence' => ['required',],
            'dob' => ['required'],
        ]);

        $uid= Helper::IDGenerator(new User(),'user_id',4,'CH');
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 8);

        $loanproduct = User::create([
            'name' => $request->name,
            'user_id' => $uid,
            'email' => $request->email,
            'phone' => $request->phone,
            'national_id' => $request->national_id,
            'residence' => $request->residence,
            'dob' => $request->dob,
            'status' => '1',
            'utype' => 'ADM',
            'password' => Hash::make($password),
        ]);
        Mail::to($request->email)->send(new AdminDetailsMail($request->email, $request->name ,$password));
        session()->flash('message',"Added successfully" );
        return redirect()->route('user.management');
    }
}
