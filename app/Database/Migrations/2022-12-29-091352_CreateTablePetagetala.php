<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePetagetala extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'petagejala_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'penyakit_kode' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'gejala_kode' => [
                'type' => 'INT',
                'unsigned' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('petagejala_id');
        $this->forge->addForeignKey('penyakit_kode', 'penyakit', 'penyakit_kode', 'cascade', 'cascade');
        $this->forge->addForeignKey('gejala_kode', 'gejala', 'gejala_kode', 'cascade', 'cascade');
        $this->forge->createTable('petagejala');
    }

    public function down()
    {
        $this->forge->dropTable('petagejala');
    }
}
