<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTableUser extends Migration
{
    public function up()
    {
        // tambah kolom alamat
        $this->forge->addField([
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unsigned' => TRUE
            ]
        ]);

        // $this->forge->createTable('users');
    }

    public function down()
    {
        //
    }
}
