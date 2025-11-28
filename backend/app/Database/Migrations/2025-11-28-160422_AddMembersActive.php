<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMembersActive extends Migration
{
    public function up()
    {
        $this->forge->addColumn('members', [
            'active' => [
                    'type'=> 'BOOLEAN',
                    'default'=> false,
            ],
            
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('members', 'active');
    }
}
