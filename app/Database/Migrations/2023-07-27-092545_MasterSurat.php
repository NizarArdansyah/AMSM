<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterSurat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
                "auto_increment" => true,
            ],
            "jenis_surat" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
        ]);

        $this->forge->addKey("id", true);
        $this->forge->createTable("master_surat", true);
    }

    public function down()
    {
        $this->forge->dropTable("master_surat", true);
    }
}
