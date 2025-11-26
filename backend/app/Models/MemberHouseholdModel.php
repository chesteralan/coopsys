<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\MemberHousehold;

class MemberHouseholdModel extends Model
{
    protected $table      = 'member_household';
    protected $primaryKey = 'id';
    protected $returnType = MemberHousehold::class;

    protected $allowedFields = [
        'member_id', 'name', 'relationship', 'date_of_birth', 'age',
        'occupation', 'employer', 'annual_income', 'is_mpc_member'
    ];
}