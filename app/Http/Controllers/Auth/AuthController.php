<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Validations\Auth\AuthValidation;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    /**
     * Validation instance.
     *
     * @var \App\Validations\Auth\AuthValidation
     */
    protected $authValidation;

    /**
     * Service instance.
     *
     * @var \App\Services\Auth\AuthService
     */
    protected $authService;

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(AuthValidation $authValidation, AuthService $authService)
    {
        $this->authValidation = $authValidation;
        $this->authService = $authService;
    }

    /**
     * Login.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validation = $this->authValidation->login($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->authService->login($request);

        return $this->sendResponse($result);
    }

    /**
     * Signup.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request)
    {
        $validation = $this->authValidation->signup($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->authService->signup($request);

        return $this->sendResponse($result);
    }
}
