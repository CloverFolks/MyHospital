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
				'constraint'	=> 30,
			],
			'label_obat' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 20,
			],
			'produsen' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'kategori' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'komposisi' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255,
			],
			'aturan_pakai' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255,
			],
			'kontra_indikasi' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255,
			],
			'no_bpom' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 20,
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
