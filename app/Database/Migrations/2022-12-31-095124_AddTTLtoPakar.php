<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTTLtoPakar extends Migration
{
    public function up()
    {
        $fields = [
            'pakar_tempatlahir' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'pakar_tgllahir' => [
                'type' => 'DATE'
            ],
        ];
        $this->forge->addColumn('pakar', $fields);
    }

    public function down()
    {
        //
    }
}
