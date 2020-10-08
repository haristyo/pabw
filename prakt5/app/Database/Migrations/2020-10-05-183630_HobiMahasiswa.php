<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HobiMahasiswa extends Migration
{
	private $table = 'hobi_mahasiswa';
	public function up()
	{	
		
		$this->forge->addField([
			//membuat kolom ditabel prodi
			'kode_hobi_mahasiswa' => [
				'type'	=> 'INT',
				'constraint'	=> '11',
				'unsigned'		=> TRUE,
				'auto_increment' => TRUE,
			],

			'kode_hobi'	=> [
				'type'	=> 'VINT',
				'constraint'	=> '11',
				'unsigned'		=> TRUE,
			],
			'nim'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> '9',
			],
		]);
		$this->forge->addKey('kode_hobi_mahasiswa', true); //menjadikan sabagai primary key
		$this->forge->addForeignKey('kode_hobi', 'hobi', 'kode_hobi', 'CASCADE', 'CASCADE'); //menmabhakan foreign key > kode_hobi ada di table hobi 
		$this->forge->addForeignKey('nim', 'mahasiswa', 'nim', 'CASCADE', 'CASCADE'); //menmabhakan foreign key
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
