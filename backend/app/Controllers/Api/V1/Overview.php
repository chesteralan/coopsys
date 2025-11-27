<?php

namespace App\Controllers\Api\V1;

class Overview extends BaseApiController
{
    protected $format    = 'json';

    public function index()
    {
        return $this->respondSuccess([
            'total_members' => 0,
            'active_members' => 0,
            'inactive_members' => 0,
        ]);
    }

}