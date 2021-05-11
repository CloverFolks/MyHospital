<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Obat extends Migration
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
			'kode'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'nama_obat' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'produsen' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],

		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('Obat');
	}

	public function down()
	{
		$this->forge->dropTable('Obat');
	}
}
