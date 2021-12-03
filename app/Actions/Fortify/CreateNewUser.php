<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

        //generate custom user id
        $uid= Helper::IDGenerator(new User(),'user_id',4,'CH');

        return User::create([
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
    }
}
