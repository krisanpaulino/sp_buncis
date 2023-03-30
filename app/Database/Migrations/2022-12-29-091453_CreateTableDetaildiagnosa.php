<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableDetaildiagnosa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'detaildiagnosa_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'petagejala_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'diagnosa_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'detaildiagnosa_jawab' => [
                'type' => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
        ]);
        $this->forge->addPrimaryKey('detaildiagnosa_id');
        $this->forge->addForeignKey('petagejala_id', 'petagejala', 'petagejala_id', 'cascade', 'cascade');
        $this->forge->addForeignKey('diagnosa_id', 'diagnosa', 'diagnosa_id', 'cascade', 'cascade');
        $this->forge->createTable('detaildiagnosa');
    }

    public function down()
    {
        $this->forge->dropTable('detaildiagnosa');
    }
}
