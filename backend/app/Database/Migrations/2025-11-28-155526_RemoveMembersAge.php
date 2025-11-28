<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveMembersAge extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('members', 'age');
    }

    public function down()
    {
        $this->forge->addColumn('members', [
            'age' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
            ],
        ]);
    }
}
