<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemberianObat extends Migration
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
			'id_obat' => [
				'type'			=> 'INT',
				'constraint'	=> 11,
			],
			'kuantitas' => [
				'type'			=> 'INT',
				'constraint'	=> 5,
			],
			'tanggal' => [
				'type'			=> 'DATE',
				'constraint'	=> null,
			],
			'id_registrasi_perawatan' => [
				'type'			=> 'INT',
				'constraint'	=> 11,
			],
			'biaya' => [
				'type'			=> 'INT',
				'constraint'	=> 11,
			],
			'metode_pembayaran' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 20,
			],

		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pemberian_obat');
	}

	public function down()
	{
		$this->forge->dropTable('pemberian_obat');
	}
}
