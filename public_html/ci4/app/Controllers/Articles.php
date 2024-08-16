<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Articles extends ResourceController
{
    protected $modelName = 'App\Models\ArticleModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }
