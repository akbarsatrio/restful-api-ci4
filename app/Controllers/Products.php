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

	public function show($id = null) {
		$model = new ProductModel();
		$data = $model->getWhere(['id' => $id])->getResult();
		return $this->respond($data) ? $data : $data->failNotFound('Data not found with id '.$id);
	}

	public function create() {
		$model = new ProductModel();
		$data = [
			'product_name' => $this->request->getPost('product_name'),
			'product_price' => $this->request->getPost('product_price')
		];
		$model->insert($data);
		$response = [
			'status'   => 201,
			'error'    => null,
			'messages' => [
				'success' => 'Data Saved'
			],
			'data' => $data
		];
		return $this->respondCreated($response, 201);
	}

	public function update($id = null) {
		$model = new ProductModel();
		$json = $this->request->getJSON();
		if($json){
			$data = [
				'product_name' => $json->product_name,
				'product_price' => $json->product_price
			];
		}else{
			$input = $this->request->getRawInput();
			$data = [
				'product_name' => $input['product_name'],
				'product_price' => $input['product_price']
			];
		}
		$model->update($id, $data);
		$response = [
			'status'   => 200,
			'error'    => null,
			'messages' => [
				'success' => 'Data Updated'
			]
		];
		return $this->respond($response);
	}

	public function delete($id = null)
		{
			$model = new ProductModel();
			$data = $model->find($id);
			if($data){
				$model->delete($id);
				$response = [
					'status'   => 200,
					'error'    => null,
					'messages' => [
						'success' => 'Data Deleted'
					]
				];
				return $this->respondDeleted($response);
			}else{
				return $this->failNotFound('No Data Found with id '.$id);
			}

		}
}
