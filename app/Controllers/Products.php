<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductModel;

class Products extends ResourceController
{
	use ResponseTrait;
	public function index()
	{
		$model = new ProductModel();
		$data = $model->findAll();
		return $this->respond($data, 200);
	}

	public function read($id = null) {
		$model = new ProductModel();
		$data = $model->getWhere(['id' => $id])->getResult();
		return $this->respond($data) ? $data : $data->failNotFound('Data not found with id '.$id);
	}

	public function create() {
		
	}
}
