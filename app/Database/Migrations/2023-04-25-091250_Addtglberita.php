<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addtglberita extends Migration
{
    public function up()
    {
        $this->forge->addColumn('berita', [
            'berita_tgl' => [
                'type' => 'DATE'
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
