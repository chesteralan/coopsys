<?php

namespace App\Controllers\Api\V1;

use App\Models\MemberVehicleModel;

class Vehicles extends BaseApiController
{
    protected $modelName = MemberVehicleModel::class;
    protected $format    = 'json';

    public function index()
    {
        return $this->respondSuccess($this->model->findAll());
    }

    public function show($id = null)
    {
        $item = $this->model->find($id);
        if (!$item) return $this->respondError('Vehicle not found', 404);

        return $this->respondSuccess($item);
    }

    public function create()
    {
        $input = $this->request->getJSON(true) ?: $this->request->getPost();

        $rules = [
            'member_id'   => 'required|is_natural_no_zero',
            'vehicle_type'=> 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->respondError($this->validator->getErrors(), 422);
        }

        $id = $this->model->insert($input);
        return $this->respondSuccess(['id' => $id, 'message' => 'Vehicle saved'], 201);
    }

    public function update($id = null)
    {
        if (!$this->model->find($id)) return $this->respondError('Vehicle not found', 404);

        $input = $this->request->getJSON(true) ?: $this->request->getRawInput();
        $this->model->update($id, $input);

        return $this->respondSuccess(['message' => 'Vehicle updated']);
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id)) return $this->respondError('Vehicle not found', 404);

        $this->model->delete($id);
        return $this->respondSuccess(['message' => 'Vehicle deleted']);
    }
}