<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Loans extends ResourceController
{
    /**
     * Return a list of loans entries
     */
    public function index()
    {
        // Example response
            $model = model('App\Models\LoansModel');
            $loans = $model->findAll();
            return $this->respond($loans);
    }

    /**
     * Return a single loans entry
     */
    public function show($id = null)
    {
        // Example response
            $model = model('App\Models\LoansModel');
            $loan = $model->find($id);
            return $this->respond($loan);
    }

    /**
     * Create a new loans entry
     */
    public function create()
    {
        // Example response
            $model = model('App\Models\LoansModel');
            $data = $this->request->getPost();
            $model->insert($data);
            return $this->respondCreated(['message' => 'Loan created']);
    }

    /**
     * Update an existing loans entry
     */
    public function update($id = null)
    {
        // Example response
            $model = model('App\Models\LoansModel');
            $data = $this->request->getRawInput();
            $model->update($id, $data);
            return $this->respond(['message' => "Loan {$id} updated"]);
    }

    /**
     * Delete a loans entry
     */
    public function delete($id = null)
    {
        // Example response
            $model = model('App\Models\LoansModel');
            $model->delete($id);
            return $this->respondDeleted(['message' => "Loan {$id} deleted"]);
    }
}
