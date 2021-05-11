<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemberianTindakan extends Migration
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
			'nama_tindakan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'biaya' => [
				'type' => 'INT',
				'constraint' => 10,
			],
			'id_dokter' => [
				'type' => 'INT',
				'constraint' => '3', //masih perlu dicek
			],
			'id_registrasi_perawatan' => [
				'type' => 'INT',
				'constraint' => '3',
			],
			'metode_pembayaran' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'tanggal' => [
				'type' => 'DATE',
				'constraint' => null,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pemberian_tindakan');
	}

	public function down()
	{
		$this->forge->dropTable('pemberian_tindakan');
	}
}
