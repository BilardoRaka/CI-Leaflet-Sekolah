<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sekolah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'kepsek' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'nohp' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'latitude' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'longitude' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'isvalid' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'akreditasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'guru' => [
                'type' => 'INT',
                'constraint' => '255',
                'null' => TRUE
            ],
            'siswa_laki' => [
                'type' => 'INT',
                'constraint' => '255',
                'null' => TRUE
            ],
            'siswa_perempuan' => [
                'type' => 'INT',
                'constraint' => '255',
                'null' => TRUE
            ],
            'kurikulum' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'penyelenggaraan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'ruang_kelas' => [
                'type' => 'INT',
                'constraint' => '255',
                'null' => TRUE
            ],
            'laboratorium' => [
                'type' => 'INT',
                'constraint' => '255',
                'null' => TRUE
            ],
            'perpustakaan' => [
                'type' => 'INT',
                'constraint' => '255',
                'null' => TRUE
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sekolah');
    }

    public function down()
    {
        $this->forge->dropTable('sekolah');
    }
}
