<?php

namespace App\Controllers\Api\V1;

use App\Models\MemberModel;

class Members extends BaseApiController
{
    protected $modelName = MemberModel::class;
    protected $format = 'json';

    public function index()
    {
        $perPage = (int) $this->request->getGet('per_page') ?: 10;
        $page = (int) $this->request->getGet('page') ?: 1;
        $status = $this->request->getGet('status') === 'active';

        $data = $this->model->where('active', $status)
        ->orderBy('last_name', 'asc')
        ->paginate($perPage, 'default', $page);
        $pager = $this->model->pager;

        return $this->respondSuccess([
            'items' => $data,
            'pager' => [
                'current' => $pager->getCurrentPage(),
                'perPage' => $pager->getPerPage(),
                'total' => $pager->getTotal(),
            ]
        ]);
    }

    public function show($id = null)
    {
        $member = $this->model->find($id);
        if (!$member)
            return $this->respondError('Member not found', 404);

        return $this->respondSuccess($member);
    }

    public function create()
    {
        $input = $this->request->getJSON(true) ?? $this->request->getPost();

        if (!$input) {
            return $this->respondError("Invalid or empty request data", 400);
        }

        // Service call
        $service = new \App\Services\MemberService();
        $result = $service->createMember($input);

        if ($result['status'] === 'error') {
            return $this->respondError($result['message'], 500);
        }

        return $this->respondSuccess([
            'member_id' => $result['member_id'],
            'message' => 'Member information created successfully'
        ], 201);
    }

    public function update($id = null)
    {
        if (!$this->model->find($id))
            return $this->respondError('Member not found', 404);

        $input = $this->request->getJSON(true) ?: $this->request->getRawInput();

        $rules = [
            'first_name' => 'permit_empty|min_length[2]',
            'last_name' => 'permit_empty|min_length[2]',
            'date_of_birth' => 'permit_empty|valid_date',
        ];

        if (!$this->validate($rules)) {
            return $this->respondError($this->validator->getErrors(), 422);
        }

        $this->model->update($id, $input);

        return $this->respondSuccess(['id' => $id, 'message' => 'Member updated']);
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id))
            return $this->respondError('Member not found', 404);

        $this->model->delete($id);

        return $this->respondSuccess(['message' => 'Member deleted']);
    }
}