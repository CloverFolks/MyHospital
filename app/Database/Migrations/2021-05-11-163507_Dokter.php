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
				'type'       => 'VARCHAR',
				'constraint' => '16',
			],
			'nip'       => [
				'type'       => 'INT',
				'constraint' => '4',
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => '30',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '30',
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'jenis_kelamin' => [
				'type' => 'BOOLEAN',
				'constraint' => null,
			],
			'image_profile' => [
				'type' => 'VARCHAR',
				'constraint' => '50', //masih perlu dicek
			],
			'izin_praktek' => [
				'type' => 'VARCHAR',
				'constraint' => '30',
			],
			'tgl_mulai_bekerja' => [
				'type' => 'DATE',
				'constraint' => null,
			],
			'no_hp' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('dokter');
	}

	public function down()
	{
		$this->forge->dropTable('dokter');
	}
}
