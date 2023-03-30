<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableDiagnosa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'diagnosa_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'diagnosa_tgl' => [
                'type' => 'DATE',
            ],
            'petani_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'diagnosa_deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
                'default' => null
            ]
        ]);
        $this->forge->addPrimaryKey('diagnosa_id');
        $this->forge->addForeignKey('petani_id', 'petani', 'petani_id', 'cascade', 'cascade');
        $this->forge->createTable('diagnosa');
    }

    public function down()
    {
        $this->forge->dropTable('diagnosa');
    }
}
