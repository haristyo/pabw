<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	private $table = 'mahasiswa';
	public function up()
	{
		$this->forge->addField([
			//membuat kolom ditabel prodi
			'nim' => [
				'type'	=> 'VARCHAR',
				'constraint'	=> '9',
			],

			'nama'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> '100',
			],
			'tempat_;ahir' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'tanggal_lahir' => [
				'type'			 => 'DATE',
			],

			'jenis_kelamin'	=> [
				'type'			=> 'ENUM',
				'constraint'	=> ['Pria', 'Wanita'],
				'default'		=> 'Pria',
			],

			'kode_agama' => [
				'type' 			=> 'INT',
				'constraint' 	=> 11,
				'unsigned' 		=> true
			],

			'alamat' => [
				'type'			 => 'TEXT',
			],
			'foto'	=> [
				'type'			 => 'TEXT',
			],
		]);
		$this->forge->addKey('nim', true); //menjadikan sabagai primary key
		$this->forge->addForeignKey('kode_agama', 'agama', 'kode_agama', 'CASCADE', 'CASCADE'); //menmabhakan foreign key
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}

