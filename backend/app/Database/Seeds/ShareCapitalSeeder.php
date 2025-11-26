<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ShareCapitalSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'member_id'  => 1,
                'amount'     => 2000.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'member_id'  => 2,
                'amount'     => 1500.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('share_capital')->insertBatch($data);
    }
}
