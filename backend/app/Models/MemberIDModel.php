<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\MemberID;

class MemberIDModel extends Model
{
    protected $table      = 'member_ids';
    protected $primaryKey = 'id';
    protected $returnType = MemberID::class;

    protected $allowedFields = ['member_id', 'id_type', 'id_number'];
}