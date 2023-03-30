<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePakar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pakar_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'pakar_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'pakar_jk' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'pakar_alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'pakar_hp' => [
                'type' => 'VARCHAR',
                'constraint' => '12',
            ],
            'pakar_pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'pakar_foto' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addPrimaryKey('pakar_id');
        $this->forge->createTable('pakar');
    }

    public function down()
    {
        $this->forge->dropTable('pakar');
    }
}
