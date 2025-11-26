<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class MemberHousehold extends Entity
{
    protected $casts = [
        'is_mpc_member' => 'boolean',
    ];
}