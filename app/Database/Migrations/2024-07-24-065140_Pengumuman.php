<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengumuman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengumuman' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'       => false,
                'auto_increment' => true,
            ],
            'pengumuman_nama' => [
                'type' => 'VARCHAR', 
                'constraint' => 100
            ],
            'pengumuman_text' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
            'pengumuman_viewer' => [
                'type' => 'VARCHAR', 
                'constraint' => 50
            ],
            'pengumuman_ptj' => [
                'type' => 'VARCHAR', 
                'constraint' => 100
            ],
            'pengumuman_updateby' => [
                'type' => 'VARCHAR', 
                'constraint' => 100
            ],
            'pengumuman_mailstate' => [
                'type' => 'VARCHAR', 
                'constraint' => 50
            ],
           'pengumuman_created' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'pengumuman_updated' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id_pengumuman', true);
        $this->forge->createTable('pengumuman');
    }

    public function down()
    {
        $this->forge->dropTable('pengumuman');
    }
}
