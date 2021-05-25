<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produsen extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_produsen' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'alamat' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'tanggal_berdiri' => [
				'type'			=> 'DATE',
				'constraint'	=> null,
			],
			'telepon' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 20,
			],
			'email' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'pabrik' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'website' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'deleted_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('produsen');
	}

	public function down()
	{
		$this->forge->dropTable('produsen');
	}
}
