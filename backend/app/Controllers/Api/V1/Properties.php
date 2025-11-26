<?php

namespace App\Controllers\Api\V1;

use App\Models\MemberPropertyModel;

class Properties extends BaseApiController
{
    protected $modelName = MemberPropertyModel::class;
    protected $format    = 'json';

    public function index()
    {
        return $this->respondSuccess($this->model->findAll());
    }

    public function show($id = null)
    {
        $item = $this->model->find($id);
        if (!$item) return $this->respondError('Property not found', 404);

        return $this->respondSuccess($item);
    }

    public function create()
    {
        $input = $this->request->getJSON(true) ?: $this->request->getPost();

        $rules = [
            'member_id'     => 'required|is_natural_no_zero',
            'property_type' => 'required',
            'lot_area_sqm'  => 'permit_empty|numeric'
        ];

        if (!$this->validate($rules)) {
            return $this->respondError($this->validator->getErrors(), 422);
        }

        $id = $this->model->insert($input);
        return $this->respondSuccess(['id' => $id, 'message' => 'Property created'], 201);
    }

    public function update($id = null)
    {
        if (!$this->model->find($id)) return $this->respondError('Property not found', 404);

        $input = $this->request->getJSON(true) ?: $this->request->getRawInput();

        if (!$this->validate(['property_type' => 'permit_empty', 'lot_area_sqm' => 'permit_empty|numeric'])) {
            return $this->respondError($this->validator->getErrors(), 422);
        }

        $this->model->update($id, $input);
        return $this->respondSuccess(['message' => 'Property updated']);
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id)) return $this->respondError('Property not found', 404);

        $this->model->delete($id);
        return $this->respondSuccess(['message' => 'Property deleted']);
    }
}