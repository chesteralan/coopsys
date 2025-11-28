<?php

namespace App\Controllers\Api\V1;

class Overview extends BaseApiController
{
    protected $format    = 'json';

    public function index()
    {

        $membersModel = new \App\Models\MemberModel();

        return $this->respondSuccess([
            'total_members' => $membersModel->countAllResults(),
            'active_members' => $membersModel->where('active', true)->countAllResults(),
            'inactive_members' => $membersModel->where('active', false)->countAllResults(),
        ]);
    }

}