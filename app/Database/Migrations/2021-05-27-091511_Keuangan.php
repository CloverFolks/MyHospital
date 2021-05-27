<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keuangan extends Migration
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
			'keterangan' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 127,
			],
			'jumlah' => [
				'type'           => 'INT',
				'constraint'     => 11
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('keuangan');
	}

	public function down()
	{
		$this->forge->dropTable('keuangan');
	}
}
