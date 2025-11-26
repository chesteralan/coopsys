<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ShareCapital extends ResourceController
{
    /**
     * Return a list of share capital entries
     */
    public function index()
    {
        $model = model('App\Models\ShareCapitalModel');
        $entries = $model->findAll();
        return $this->respond($entries);
    }

    /**
     * Return a single share capital entry
     */
    public function show($id = null)
    {
        $model = model('App\Models\ShareCapitalModel');
        $entry = $model->find($id);
        return $this->respond($entry);
    }

    /**
     * Create a new share capital entry
     */
    public function create()
    {
        $model = model('App\Models\ShareCapitalModel');
        $data = $this->request->getPost();
        $model->insert($data);
        return $this->respondCreated(['message' => 'Share capital entry created']);
    }

    /**
     * Update an existing share capital entry
     */
    public function update($id = null)
    {
        $model = model('App\Models\ShareCapitalModel');
        $data = $this->request->getRawInput();
        $model->update($id, $data);
        return $this->respond(['message' => "Share capital entry {$id} updated"]);
    }

    /**
     * Delete a share capital entry
     */
    public function delete($id = null)
    {
        $model = model('App\Models\ShareCapitalModel');
        $model->delete($id);
        return $this->respondDeleted(['message' => "Share capital entry {$id} deleted"]);
    }
}
