<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Validations\User\UserValidation;
use App\Services\User\UserService;

class UserController extends Controller
{
    /**
     * Validation instance.
     *
     * @var \App\Validations\User\UserValidation
     */
    protected $userValidation;

    /**
     * Service instance.
     *
     * @var \App\Services\User\UserService
     */
    protected $userService;

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(UserValidation $userValidation, UserService $userService)
    {
        $this->userValidation = $userValidation;
        $this->userService = $userService;
    }

    /**
     * Index.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validation = $this->userValidation->index($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->userService->index($request);

        return $this->sendResponse($result);
    }
}
