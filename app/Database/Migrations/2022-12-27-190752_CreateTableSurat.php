<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSurat extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'nomor_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true
            ],
            'tanggal_surat' => [
                'type' => 'DATE'
            ],
            'pemohon' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'perihal' => [
                'type' => 'TEXT',
                'constraint' => 255
            ],
            'keperluan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
        ]);
        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('surat');
    }

    public function down()
    {
        //
        $this->forge->dropTable('surat');
    }
}
