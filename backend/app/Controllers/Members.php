<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Members extends ResourceController
{
    /**
     * Return a list of members
     */
    public function index()
    {
        $model = model('App\Models\MembersModel');
        $members = $model->findAll();
        return $this->respond($members);
    }

    /**
     * Return a single member
     */
    public function show($id = null)
    {
        $model = model('App\Models\MembersModel');
        $member = $model->find($id);
        return $this->respond($member);
    }

    /**
     * Create a new member
     */
    public function create()
    {
        $model = model('App\Models\MembersModel');
        $data = $this->request->getPost();
        $model->insert($data);
        return $this->respondCreated(['message' => 'Member created']);
    }

    /**
     * Update an existing member
     */
    public function update($id = null)
    {
        $model = model('App\Models\MembersModel');
        $data = $this->request->getRawInput();
        $model->update($id, $data);
        return $this->respond(['message' => "Member {$id} updated"]);
    }

    /**
     * Delete a member
     */
    public function delete($id = null)
    {
        $model = model('App\Models\MembersModel');
        $model->delete($id);
        return $this->respondDeleted(['message' => "Member {$id} deleted"]);
    }
}
