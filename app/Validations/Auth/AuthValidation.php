<?php

namespace App\Validations\Auth;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthValidation
{
    /**
     * Login validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function login($request)
    {
        $result = [];
        $result['status'] = false;

        $validate = [
            'username' => ['required', 'min:2', 'exists:users,username'],
            'password' => ['required', 'min:5'],
        ];

        $request->validate($validate);

        $user = User::firstWhere('username', $request->username);

        // * Check password is correct
        if (!Hash::check($request->password, $user->password)) {
            $result['message'] = 'Incorrect password !';
            $result = (object) $result;
            return $result;
        }

        // * Validation success
        $result['status'] = true;
        $result = (object) $result;

        return $result;
    }

    /**
     * Signup validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function signup($request)
    {
        $result = [];
        $result['status'] = false;

        $validate = [
            'fullname' => ['required'],
            'username' => ['required', 'min:2'],
            'password' => ['required', 'min:5'],
        ];

        $request->validate($validate);

        $user = User::firstWhere('username', $request->username);

        // * Check username is unique
        if (!empty($user)) {
            $result['statusCode'] = 409;
            $result['message'] = 'Username is already exists !';
            $result = (object) $result;
            return $result;
        }

        // * Validation success
        $result['status'] = true;
        $result = (object) $result;

        return $result;
    }
}
