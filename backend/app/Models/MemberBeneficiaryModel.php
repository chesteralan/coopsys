<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\MemberBeneficiary;

class MemberBeneficiaryModel extends Model
{
    protected $table      = 'member_beneficiaries';
    protected $primaryKey = 'id';
    protected $returnType = MemberBeneficiary::class;

    protected $allowedFields = ['member_id', 'name', 'relationship', 'date_of_birth'];
}