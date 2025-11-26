<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\MemberSkill;

class MemberSkillModel extends Model
{
    protected $table      = 'member_skills';
    protected $primaryKey = 'id';
    protected $returnType = MemberSkill::class;

    protected $allowedFields = ['member_id', 'category', 'skill'];
}