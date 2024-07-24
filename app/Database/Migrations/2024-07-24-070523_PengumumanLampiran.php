<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengumumanLampiran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'lampiran_nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'       => false,
                'auto_increment' => false,
            ],
            'lampiran_url' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
            'pengumuman_id' => [
                'type' => 'INT', 
                'constraint' => 11,
                'null' => false,
                'auto_increment' => false

            ],
           'lampiran_created' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'lampiran_updated' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey(['lampiran_nama', 'pengumuman_id'], true);
        $this->forge->createTable('pengumuman_lampiran');
    }

    public function down()
    {
        $this->forge->dropTable('pengumuman_lampiran');
    }
}
