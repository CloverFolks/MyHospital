<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dokter extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nik'       => [
				'type'       => 'CHAR',
				'constraint' => 16,
			],
			'nip'		=> [
				'type'		=> 'CHAR',
				'constraint' => 4,
			],
			'nip'       => [
				'type'       => 'CHAR',
				'constraint' => '4',
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'jenis_kelamin' => [
				'type' => 'BOOLEAN',
				'constraint' => null,
			],
			'image_profile' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'izin_praktek' => [
				'type' => 'CHAR',
				'constraint' => 18,
			],
			'tgl_mulai_bekerja' => [
				'type' => 'DATE',
				'constraint' => null,
			],
			'no_hp' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
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
		$this->forge->createTable('dokter');
	}

	public function down()
	{
		$this->forge->dropTable('dokter');
	}
}
