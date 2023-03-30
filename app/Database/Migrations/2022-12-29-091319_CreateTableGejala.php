<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableGejala extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'gejala_kode' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'gejala_nama' => [
                'type' => 'TEXT',
            ]
        ]);
        $this->forge->addPrimaryKey('gejala_kode');
        $this->forge->createTable('gejala');
    }

    public function down()
    {
        $this->forge->dropTable('gejala');
    }
}
