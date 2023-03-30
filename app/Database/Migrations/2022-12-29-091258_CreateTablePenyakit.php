<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePenyakit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'penyakit_kode' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'penyakit_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'penyakit_detail' => [
                'type' => 'TEXT',
            ],
            'penyakit_solusi' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addPrimaryKey('penyakit_kode');
        $this->forge->createTable('penyakit');
    }

    public function down()
    {
        $this->forge->dropTable('penyakit');
    }
}
