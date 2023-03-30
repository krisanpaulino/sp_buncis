<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIDtoPetani extends Migration
{
    public function up()
    {
        $this->forge->addColumn('petani', [
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'CONSTRAINT FK_user_petani FOREIGN KEY (user_id) REFERENCES user(user_id) on delete cascade'
        ]);
    }

    public function down()
    {
        //
    }
}
