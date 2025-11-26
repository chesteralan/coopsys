<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MemberRelatedSeeder extends Seeder
{
    public function run()
    {
        // Add sample ID
        $this->db->table('member_ids')->insert([
            'member_id' => 1,
            'id_type' => 'PhilHealth',
            'id_number' => 'PH123456789'
        ]);

        // Add Household
        $this->db->table('member_household')->insert([
            'member_id' => 1,
            'name' => 'Maria Dela Cruz',
            'relationship' => 'Mother',
            'age' => 60,
            'occupation' => 'Housewife',
            'is_mpc_member' => 0
        ]);

        // Add Property
        $this->db->table('member_properties')->insert([
            'member_id' => 1,
            'property_type' => 'Residential',
            'lot_number' => 'Lot 12',
            'location' => 'Barangay Uno',
            'lot_area_sqm' => 120
        ]);

        // Add Vehicle
        $this->db->table('member_vehicles')->insert([
            'member_id' => 1,
            'vehicle_type' => 'Motorcycle'
        ]);

        // Beneficiary
        $this->db->table('member_beneficiaries')->insert([
            'member_id' => 1,
            'name' => 'Ana Dela Cruz',
            'relationship' => 'Sister',
        ]);

        // Skills
        $this->db->table('member_skills')->insert([
            'member_id' => 1,
            'category' => 'Construction',
            'skill' => 'Carpentry'
        ]);

        // Cooperative
        $this->db->table('member_cooperatives')->insert([
            'member_id' => 1,
            'cooperative_name' => 'Barbaza MPC',
            'cooperative_address' => 'Barbaza, Antique'
        ]);
    }
}