<?php

namespace App\Services\User;

use App\Models\User;

class UserService
{
    /**
     * Index service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function index($request)
    {
        try {
            $pageNumber = 1;
            $amountOfData = 20;

            if ($request->page_number) {
                $pageNumber = $request->page_number;
            }

            if ($request->amount_of_data) {
                $amountOfData = $request->amount_of_data;
            }

            $paginateData = User::getPaginatedData(true, $pageNumber, $amountOfData, 'fullname', 'asc');

            $user = $paginateData->data;
            $pagination = $paginateData->pagination;

            $status = true;
            $message = 'Data retrieved successfully !';

            $result = (object) [
                'status' => $status,
                'message' => $message,
                'data' => $user,
                'pagination' => $pagination,
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
