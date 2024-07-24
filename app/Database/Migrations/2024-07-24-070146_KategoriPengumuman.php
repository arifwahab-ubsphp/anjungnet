<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriPengumuman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cat_news_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'       => false,
                'auto_increment' => true,
            ],
            'cat_news_name' => [
                'type' => 'VARCHAR', 
                'constraint' => 100
            ],
            'cat_news_updateby' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
           'cat_news_created' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'cat_news_updated' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'cat_news_state' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
        ]);
        $this->forge->addKey('cat_news_id', true);
        $this->forge->createTable('kategori_pengumuman');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_pengumuman');
    }
}
