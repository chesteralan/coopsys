<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\MemberProperty;

class MemberPropertyModel extends Model
{
    protected $table      = 'member_properties';
    protected $primaryKey = 'id';
    protected $returnType = MemberProperty::class;

    protected $allowedFields = [
        'member_id', 'property_type', 'land_title_number', 'lot_number',
        'location', 'lot_area_sqm', 'is_agriculture', 'agriculture_rice',
        'agriculture_corn', 'agriculture_sugarcane', 'agriculture_coconut',
        'agriculture_others'
    ];
}