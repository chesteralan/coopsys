<?php

namespace App\Models;

use CodeIgniter\Model;

class ShareCapitalModel extends Model
{
    protected $table      = 'share_capital';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'member_id',
        'amount',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
