<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class MemberProperty extends Entity
{
    protected $casts = [
        'is_agriculture' => 'boolean',
        'agriculture_rice' => 'boolean',
        'agriculture_corn' => 'boolean',
        'agriculture_sugarcane' => 'boolean',
        'agriculture_coconut' => 'boolean',
    ];
}