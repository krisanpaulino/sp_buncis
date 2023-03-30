<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeFKPEtagejalatoGejalaKode extends Migration
{
    public function up()
    {
        $this->forge->dropForeignKey('detaildiagnosa', 'detaildiagnosa_petagejala_id_foreign');
        $this->forge->dropColumn('detaildiagnosa', 'petagejala_id');
        $this->forge->addColumn('detaildiagnosa', [
            'gejala_kode' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'CONSTRAINT detaildiagnosa_gejala_kode_foreign FOREIGN KEY(gejala_kode) REFERENCES gejala(gejala_kode) ON DELETE cascade'
        ]);
    }

    public function down()
    {
        //
    }
}
