<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBerita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'berita_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'berita_judul' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'berita_isi' => [
                'type' => 'TEXT'
            ],
            'berita_thumbnail' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'berita_highlight' => [
                'type' => 'INT',
                'constraint' => 1
            ]
        ]);
        $this->forge->addPrimaryKey('berita_id');
        $this->forge->createTable('berita');
    }

    public function down()
    {
        $this->forge->dropTable('berita');
    }
}
