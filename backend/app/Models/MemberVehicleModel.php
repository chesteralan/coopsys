<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\MemberVehicle;

class MemberVehicleModel extends Model
{
    protected $table      = 'member_vehicles';
    protected $primaryKey = 'id';
    protected $returnType = MemberVehicle::class;

    protected $allowedFields = ['member_id', 'vehicle_type', 'other_details'];
}