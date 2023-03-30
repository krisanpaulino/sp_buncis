<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_password' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'user_email' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'user_type' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ]
        ]);
        $this->forge->addPrimaryKey('user_id');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
