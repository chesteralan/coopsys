<?php

namespace App\Services;

use CodeIgniter\Database\Exceptions\DataException;
use Config\Database;

use App\Models\MemberModel;
use App\Models\MemberIDModel;
use App\Models\MemberHouseholdModel;
use App\Models\MemberPropertyModel;
use App\Models\MemberVehicleModel;
use App\Models\MemberBeneficiaryModel;
use App\Models\MemberSkillModel;
use App\Models\MemberCooperativeModel;

class MemberService
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * Creates a member and related child records in a single DB transaction.
     */
    public function createMember(array $payload)
    {
        $this->db->transBegin();

        try {
            // MAIN MEMBER
            $memberData = $payload ?? null;
            if (!$memberData) {
                throw new DataException("Missing 'member' data");
            }

            $memberModel = new MemberModel();
            $memberId = $memberModel->insert($memberData);

            if (!$memberId) {
                throw new DataException("Failed to create member");
            }

            if ($this->db->transStatus() === false) {
                throw new DataException("Transaction failed");
            }

            $this->db->transCommit();

            return [
                'status' => 'success',
                'member_id' => $memberId
            ];
        } catch (\Throwable $e) {
            $this->db->transRollback();
            return [
                'status'  => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Creates a member and related child records in a single DB transaction.
     */
    public function createMemberWithRelations(array $payload)
    {
        $this->db->transBegin();

        try {
            // MAIN MEMBER
            $memberData = $payload['member'] ?? null;
            if (!$memberData) {
                throw new DataException("Missing 'member' data");
            }

            $memberModel = new MemberModel();
            $memberId = $memberModel->insert($memberData);

            if (!$memberId) {
                throw new DataException("Failed to create member");
            }

            // CHILD HELPERS
            $this->insertChild(new MemberIDModel(),          $payload['ids'] ?? [],            $memberId);
            $this->insertChild(new MemberHouseholdModel(),   $payload['household'] ?? [],      $memberId);
            $this->insertChild(new MemberPropertyModel(),    $payload['properties'] ?? [],     $memberId);
            $this->insertChild(new MemberVehicleModel(),     $payload['vehicles'] ?? [],       $memberId);
            $this->insertChild(new MemberBeneficiaryModel(), $payload['beneficiaries'] ?? [],  $memberId);
            $this->insertChild(new MemberSkillModel(),       $payload['skills'] ?? [],         $memberId);
            $this->insertChild(new MemberCooperativeModel(), $payload['cooperatives'] ?? [],   $memberId);

            if ($this->db->transStatus() === false) {
                throw new DataException("Transaction failed");
            }

            $this->db->transCommit();

            return [
                'status' => 'success',
                'member_id' => $memberId
            ];
        } catch (\Throwable $e) {
            $this->db->transRollback();
            return [
                'status'  => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Inserts related child records with auto-attached member_id
     */
    protected function insertChild($model, array $records, int $memberId)
    {
        foreach ($records as $row) {
            $row['member_id'] = $memberId;

            if (!$model->insert($row)) {
                throw new DataException("Failed to insert into " . get_class($model));
            }
        }
    }
}