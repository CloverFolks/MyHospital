<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RegistrasiPerawatan extends Migration
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
			'no_registrasi'       => [
				'type'       => 'VARCHAR',
				'constraint' => '6',
			],
			'tgl_masuk' => [
				'type' => 'DATE',
				'constraint' => null,
			],
			'tgl_keluar' => [
				'type' => 'DATE',
				'constraint' => null,
			],
			'poliklinik' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'id_dokter' => [
				'type' => 'INT',
				'constraint' => '3', //masih perlu dicek
			],
			'id_pasien' => [
				'type' => 'INT',
				'constraint' => '3',
			],
			'nama_pasien' => [
				'type' => 'VARCHAR',
				'constraint' => '30',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('registrasi_perawatan');
	}

	public function down()
	{
		$this->forge->dropTable('registrasi_perawatan');
	}
}
