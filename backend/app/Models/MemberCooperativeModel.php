<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\MemberCooperative;

class MemberCooperativeModel extends Model
{
    protected $table      = 'member_cooperatives';
    protected $primaryKey = 'id';
    protected $returnType = MemberCooperative::class;

    protected $allowedFields = ['member_id', 'cooperative_name', 'cooperative_address'];
}