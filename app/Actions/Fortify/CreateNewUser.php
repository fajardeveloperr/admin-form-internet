<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            // 'utype'=>['required'],
        ])->validate();

        // if($input['utype'] === 'SALES')
        // {
        //     $utype = 'R0!3-54les';
        // }
        // elseif($input['utype'] === 'MANAGER')
        // {
        //     $utype = 'R0!3-m4n4ger';
        // }
        // elseif($input['utype'] === 'SUPERADMIN')
        // {
        //     $utype = 'R0!3-5UP3RADMIN';
        // }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            // 'utype'=> $utype,
        ]);
    }
}
