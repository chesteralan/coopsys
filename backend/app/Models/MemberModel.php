<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Member;

class MemberModel extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $returnType = Member::class;

    protected $allowedFields = [
        'first_name',
        'last_name',
        'middle_name',
        'date_of_birth',
        'place_of_birth',
        'religion',
        'gender',
        'height_cm',
        'weight_kg',
        'address',
        'contact_number',
        'tax_identification_number',
        'civil_status',

        'educational_elementary',
        'educational_highschool',
        'educational_vocational',
        'educational_college',
        'educational_post_grad',
        'educational_none',

        'vocational_graduate',
        'vocational_degree',
        'college_graduate',
        'college_degree',
        'post_graduate_graduate',
        'post_graduate_degree',

        'occupation_type',
        'employment_status',
        'employer_name',
        'employer_address',
        'employer_annual_income',
        'business_name',
        'business_address',
        'business_contact_number',
        'business_annual_income',

        'farming',
        'fishing',
        'livestock_swine',
        'livestock_poultry',
        'livestock_others',
        'active',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
