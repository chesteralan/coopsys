<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Member extends Entity
{
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'educational_elementary' => 'boolean',
        'educational_highschool' => 'boolean',
        'educational_vocational' => 'boolean',
        'educational_college'    => 'boolean',
        'educational_post_grad'  => 'boolean',
        'educational_none'       => 'boolean',

        'vocational_graduate' => 'boolean',
        'college_graduate'    => 'boolean',
        'post_graduate_graduate' => 'boolean',

        'farming'          => 'boolean',
        'fishing'          => 'boolean',
        'livestock_swine'  => 'boolean',
        'livestock_poultry'=> 'boolean',
    ];
}