<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePetani extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'petani_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'petani_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'petani_jk' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'petani_alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'petani_hp' => [
                'type' => 'VARCHAR',
                'constraint' => '12',
            ],
            'petani_foto' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addPrimaryKey('petani_id');
        $this->forge->createTable('petani');
    }

    public function down()
    {
        $this->forge->dropTable('petani');
    }
}
