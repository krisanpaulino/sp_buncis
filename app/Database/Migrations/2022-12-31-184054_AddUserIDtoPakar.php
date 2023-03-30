<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIDtoPakar extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pakar', [
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'CONSTRAINT FK_user_pakar FOREIGN KEY (user_id) REFERENCES user(user_id) on delete cascade'
        ]);
    }

    public function down()
    {
        //
    }
}
