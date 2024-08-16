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
    public function show($id = null)
    {

        $data = $this->model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    public function create()
    {
        $data = [
            'title' => $this->request->getVar('title'),
            'slug' => $this->request->getVar('slug'),
            'body' => $this->request->getVar('body'),

        ];
        $this->model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }    


    public function update($id = null)
    {

        //$input = $this->request->getRawInput();
        //$id = $this->request->getVar('id'),
        $id = $this->request->getVar('id');
        $data = [
            'title' => $this->request->getVar('title'),
            'slug' => $this->request->getVar('slug'),
            'body' => $this->request->getVar('body'),            
        ];

        $this->model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }

}