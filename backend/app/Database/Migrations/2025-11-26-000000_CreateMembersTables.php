<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMembersTables extends Migration
{
    public function up()
    {
        /*
        |--------------------------------------------------------------------------
        | members
        |--------------------------------------------------------------------------
        */
        $this->forge->addField([
            'id'                        => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'first_name'                => ['type' => 'VARCHAR', 'constraint' => 100],
            'last_name'                 => ['type' => 'VARCHAR', 'constraint' => 100],
            'middle_name'               => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'date_of_birth'             => ['type' => 'DATE', 'null' => true],
            'place_of_birth'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'religion'                  => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'age'                       => ['type' => 'INT', 'null' => true],
            'gender'                    => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
            'height_cm'                 => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'weight_kg'                 => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'address'                   => ['type' => 'TEXT', 'null' => true],
            'contact_number'            => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'tax_identification_number' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'civil_status'              => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],

            // Educational attainment
            'educational_elementary'    => ['type' => 'BOOLEAN', 'default' => false],
            'educational_highschool'    => ['type' => 'BOOLEAN', 'default' => false],
            'educational_vocational'    => ['type' => 'BOOLEAN', 'default' => false],
            'educational_college'       => ['type' => 'BOOLEAN', 'default' => false],
            'educational_post_grad'     => ['type' => 'BOOLEAN', 'default' => false],
            'educational_none'          => ['type' => 'BOOLEAN', 'default' => false],

            'vocational_graduate'       => ['type' => 'BOOLEAN', 'default' => false],
            'vocational_degree'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'college_graduate'          => ['type' => 'BOOLEAN', 'default' => false],
            'college_degree'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'post_graduate_graduate'    => ['type' => 'BOOLEAN', 'default' => false],
            'post_graduate_degree'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],

            // Employment
            'occupation_type'           => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'employment_status'         => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'employer_name'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'employer_address'          => ['type' => 'TEXT', 'null' => true],
            'employer_annual_income'    => ['type' => 'DECIMAL', 'constraint' => '12,2', 'null' => true],

            // Business
            'business_name'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'business_address'          => ['type' => 'TEXT', 'null' => true],
            'business_contact_number'   => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'business_annual_income'    => ['type' => 'DECIMAL', 'constraint' => '12,2', 'null' => true],

            // Livelihood partial (from form)
            'farming'                   => ['type' => 'BOOLEAN', 'default' => false],
            'fishing'                   => ['type' => 'BOOLEAN', 'default' => false],
            'livestock_swine'           => ['type' => 'BOOLEAN', 'default' => false],
            'livestock_poultry'         => ['type' => 'BOOLEAN', 'default' => false],
            'livestock_others'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],

            'created_at'                => ['type' => 'DATETIME', 'null' => true],
            'updated_at'                => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('members');

        /*
        |--------------------------------------------------------------------------
        | member_ids
        |--------------------------------------------------------------------------
        */
        $this->forge->addField([
            'id'         => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'member_id'  => ['type' => 'BIGINT', 'unsigned' => true],
            'id_type'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'id_number'  => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('member_id', 'members', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('member_ids');

        /*
        |--------------------------------------------------------------------------
        | member_household
        |--------------------------------------------------------------------------
        */
        $this->forge->addField([
            'id'            => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'member_id'     => ['type' => 'BIGINT', 'unsigned' => true],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'relationship'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'date_of_birth' => ['type' => 'DATE', 'null' => true],
            'age'           => ['type' => 'INT', 'null' => true],
            'occupation'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'employer'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'annual_income' => ['type' => 'DECIMAL', 'constraint' => '12,2', 'null' => true],
            'is_mpc_member' => ['type' => 'BOOLEAN', 'default' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('member_id', 'members', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('member_household');

        /*
        |--------------------------------------------------------------------------
        | member_properties
        |--------------------------------------------------------------------------
        */
        $this->forge->addField([
            'id'                     => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'member_id'              => ['type' => 'BIGINT', 'unsigned' => true],
            'property_type'          => ['type' => 'VARCHAR', 'constraint' => 50],
            'land_title_number'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'lot_number'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'location'               => ['type' => 'TEXT', 'null' => true],
            'lot_area_sqm'           => ['type' => 'DECIMAL', 'constraint' => '12,2', 'null' => true],
            'is_agriculture'         => ['type' => 'BOOLEAN', 'default' => false],
            'agriculture_rice'       => ['type' => 'BOOLEAN', 'default' => false],
            'agriculture_corn'       => ['type' => 'BOOLEAN', 'default' => false],
            'agriculture_sugarcane'  => ['type' => 'BOOLEAN', 'default' => false],
            'agriculture_coconut'    => ['type' => 'BOOLEAN', 'default' => false],
            'agriculture_others'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('member_id', 'members', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('member_properties');

        /*
        |--------------------------------------------------------------------------
        | member_vehicles
        |--------------------------------------------------------------------------
        */
        $this->forge->addField([
            'id'          => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'member_id'   => ['type' => 'BIGINT', 'unsigned' => true],
            'vehicle_type'=> ['type' => 'VARCHAR', 'constraint' => 50],
            'other_details'=> ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('member_id', 'members', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('member_vehicles');

        /*
        |--------------------------------------------------------------------------
        | member_beneficiaries
        |--------------------------------------------------------------------------
        */
        $this->forge->addField([
            'id'            => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'member_id'     => ['type' => 'BIGINT', 'unsigned' => true],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'relationship'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'date_of_birth' => ['type' => 'DATE', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('member_id', 'members', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('member_beneficiaries');

        /*
        |--------------------------------------------------------------------------
        | member_skills
        |--------------------------------------------------------------------------
        */
        $this->forge->addField([
            'id'        => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'member_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'category'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'skill'     => ['type' => 'VARCHAR', 'constraint' => 255],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('member_id', 'members', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('member_skills');

        /*
        |--------------------------------------------------------------------------
        | member_cooperatives
        |--------------------------------------------------------------------------
        */
        $this->forge->addField([
            'id'                => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'member_id'         => ['type' => 'BIGINT', 'unsigned' => true],
            'cooperative_name'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'cooperative_address'=> ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('member_id', 'members', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('member_cooperatives');
    }

    public function down()
    {
        $this->forge->dropTable('member_cooperatives', true);
        $this->forge->dropTable('member_skills', true);
        $this->forge->dropTable('member_beneficiaries', true);
        $this->forge->dropTable('member_vehicles', true);
        $this->forge->dropTable('member_properties', true);
        $this->forge->dropTable('member_household', true);
        $this->forge->dropTable('member_ids', true);
        $this->forge->dropTable('members', true);
    }
}