<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengumuman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pengumuman_name' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
            'pengumuman_group_by' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
            'pengumuman_update_by' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
            'pengumuman_mail_status' => [
                'type' => 'INT', 
                'constraint' => 11
            ],
           'pengumuman_date_created' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'pengumuman_date_updated' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('anj_pengumuman');
        
    }

    public function down()
    {
        $this->forge->dropTable('anj_pengumuman');
    }
}