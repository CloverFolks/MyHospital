<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RegistrasiPerawatan extends Migration
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
			'no_registrasi' => [
				'type'			=> 'CHAR',
				'constraint'	=> '10',
			],
			'tgl_masuk' => [
				'type'			=> 'DATETIME',
				'constraint'	=> null,
			],
			'tgl_keluar' => [
				'type' 			=> 'DATETIME',
				'constraint' 	=> null,
			],
			'poliklinik' => [
				'type'			=> 'VARCHAR',
				'constraint' 	=> '50',
			],
			'id_dokter' => [
				'type'			=> 'INT',
				'constraint'	=> '11',
			],
			'id_pasien' => [
				'type'			=> 'INT',
				'constraint'	=> '11',
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
