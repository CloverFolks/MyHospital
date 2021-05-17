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
			'produsen' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],

		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('obat');
	}

	public function down()
	{
		$this->forge->dropTable('obat');
	}
}
