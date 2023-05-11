<?php

namespace App\Validations\User;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserValidation
{
    /**
     * Index validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function index($request)
    {
        $result = [];
        $result['status'] = false;

        $validate = [
            'page_number' => ['sometimes', 'numeric'],
            'amount_of_data' => ['sometimes', 'numeric'],
        ];

        $request->validate($validate);

        // * Validation success
        $result['status'] = true;
        $result = (object) $result;

        return $result;
    }
}
