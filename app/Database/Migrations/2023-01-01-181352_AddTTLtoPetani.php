<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTTLtoPetani extends Migration
{
    public function up()
    {
        $fields = [
            'petani_tempatlahir' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'petani_tgllahir' => [
                'type' => 'DATE'
            ],
        ];
        $this->forge->addColumn('petani', $fields);
    }

    public function down()
    {
        //
    }
}
