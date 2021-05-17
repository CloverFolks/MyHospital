<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pasien extends Migration
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
			'image_profile' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'no_rekam_medis' => [
				'type' => 'CHAR',
				'constraint' => 10,
			],
			'nama_pasien' => [
				'type' => 'VARCHAR',
				'constraint' => '30',
			],
			'pekerjaan' => [
				'type' => 'VARCHAR',
				'constraint' => '36',
			],
			'no_hp' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'jenis_kelamin' => [
				'type' => 'BOOLEAN',
				'constraint' => null,
			],
			'golongan_darah' => [
				'type' => 'VARCHAR',
				'constraint' => '5',
			],
			'tgl_lahir' => [
				'type' => 'DATE',
				'constraint' => null,
			],
			'status_menikah' => [
				'type' => 'BOOLEAN',
				'constraint' => null,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pasien');
	}

	public function down()
	{
		$this->forge->dropTable('pasien');
	}
}
