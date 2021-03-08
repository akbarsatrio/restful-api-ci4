<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProduct extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'auto_increment' => true,
				'constraint' => 11
			],
			'product_name' => [
				'type' => 'VARCHAR',
				'constraint' => 64
			],
			'product_price' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true
			]
		]);
		$this->forge->addKey('id', true);
    $this->forge->createTable('products');
	}

	public function down()
	{
		//
	}
}
