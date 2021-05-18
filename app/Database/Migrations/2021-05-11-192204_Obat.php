<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Obat extends Migration
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
			'kode' => [
				'type'       => 'CHAR',
				'constraint' => 13,
			],
			'nama_obat' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'jenis_obat' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'label_obat' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'produsen' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'no_bpom' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 20,
			],
			'tgl_produksi' => [
				'type'			=> 'DATE',
				'constraint'	=> null,
			],
			'tgl_kedaluwarsa' => [
				'type'			=> 'DATE',
				'constraint'	=> null,
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
		$this->forge->createTable('obat');
	}

	public function down()
	{
		$this->forge->dropTable('obat');
	}
}
