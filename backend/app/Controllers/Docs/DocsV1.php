<?php

namespace App\Controllers\Docs;

use CodeIgniter\Controller;

class DocsV1 extends Controller
{
    public function index()
    {
        return view('swagger');
    }

    public function openapi()
    {
        // Serve the YAML file
        $path = FCPATH . 'openapi-v1.yaml';

        return $this->response
            ->setHeader('Content-Type', 'application/yaml')
            ->setBody(file_get_contents($path));
    }
}