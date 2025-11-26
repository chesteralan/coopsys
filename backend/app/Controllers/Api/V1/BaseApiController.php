<?php

namespace App\Controllers\Api\V1;

use CodeIgniter\RESTful\ResourceController;

class BaseApiController extends ResourceController
{
    protected function respondSuccess($data, $code = 200)
    {
        return $this->respond([
            'status' => 'success',
            'data'   => $data
        ], $code);
    }

    protected function respondError($message, $code = 400)
    {
        return $this->respond([
            'status'  => 'error',
            'message' => $message
        ], $code);
    }
}