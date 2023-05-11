<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthService
{
    /**
     * Login service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function login($request)
    {
        // try {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $token = auth()->attempt($data);

        $user = User::firstWhere('username', $request->username);
        $user->token = $token;

        $status = true;
        $message = 'Login successfully !';

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $user,
        ];

        return $result;
        // } catch (\Throwable $th) {
        //     $status = false;
        //     $statusCode = 400;
        //     $message = 'Bad request !';

        //     $result = (object) [
        //         'status' => $status,
        //         'statusCode' => $statusCode,
        //         'message' => $message,
        //     ];

        //     return $result;
        // }
    }

    /**
     * Signup service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function signup($request)
    {
        try {
            $data = [
                'fullname' => $request->fullname,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ];

            $user = User::create($data);

            $data = [
                'username' => $request->username,
                'password' => $request->password,
            ];

            $token = auth()->attempt($data);

            $user = User::firstWhere('id', $user->id);
            $user->token = $token;

            $status = true;
            $message = 'Account successfully registered !';

            $result = (object) [
                'status' => $status,
                'message' => $message,
                'data' => $user,
            ];

            return $result;
        } catch (\Throwable $th) {
            $status = false;
            $statusCode = 400;
            $message = 'Bad request !';

            $result = (object) [
                'status' => $status,
                'statusCode' => $statusCode,
                'message' => $message,
            ];

            return $result;
        }
    }
}
