<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPenyakitFoto extends Migration
{
    public function up()
    {
        $this->forge->addColumn('penyakit', [
            'penyakit_foto' => [
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
