<?php

namespace App\Actions\Fortify;

use App\Mail\OtpMail;
use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Helpers\Helper;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'national_id' => ['required','unique:users'],
            'residence' => ['required',],
            'dob' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $uid= Helper::IDGenerator(new User(),'user_id',4,'CH');

		$otp = new Otp;
        $newotp =  $otp->generate($uid, $digits = 4, $validity = 30);


        $name = $input['name'];
		Mail::to($input['email'])->send(new OtpMail($newotp->token, $name));

//        $message = 'Your verification code is '.$newotp->token;
//        $phone = $input['phone'];
//        $otpsms = Helper::sendSMS($phone ,$message);

        $user = User::create([
            'name' => $input['name'],
            'user_id' => $uid,
            'email' => $input['email'],
            'phone' => $input['phone'],
            'national_id' => $input['national_id'],
            'residence' => $input['residence'],
            'dob' => $input['dob'],
            'status' => '0',
            'utype' => 'USR',
            'password' => Hash::make($input['password']),
        ]);

        return $user;
    }
}
