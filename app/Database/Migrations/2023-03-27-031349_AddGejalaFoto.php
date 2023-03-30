<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGejalaFoto extends Migration
{
    public function up()
    {
        $this->forge->addColumn('gejala', [
            'gejala_foto' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
