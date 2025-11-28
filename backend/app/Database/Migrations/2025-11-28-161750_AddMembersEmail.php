<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMembersEmail extends Migration
{
    public function up()
    {
        $this->forge->addColumn('members', [
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'contact_number',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('members', 'email');
    }
}
