<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agama extends Migration
{
	private $table = 'agama';
	public function up()
	{
	
		$this->forge->addField([
			//membuat kolom ditabel prodi
			'kode_agama' => [
				'type'	=> 'INT',
				'constraint'	=> '11',
				'unsigned'		=> TRUE,
				'auto_increment' => TRUE,
			],

			'nama_agama'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> '100',
			],
		]);
		$this->forge->addKey('kode_agama', true); //menjadikan sabagai primary key
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
