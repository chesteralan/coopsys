<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LoansSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'member_id'  => 1,
                'amount'     => 1000.00,
                'status'     => 'approved',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'member_id'  => 2,
                'amount'     => 500.00,
                'status'     => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('loans')->insertBatch($data);
    }
}
