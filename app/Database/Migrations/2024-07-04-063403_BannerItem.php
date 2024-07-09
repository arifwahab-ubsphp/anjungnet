<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BannerItem extends Migration
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
            'id_anj_banner' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'item_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'item_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'item_image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'item_link' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
            'item_datatype' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'item_caption' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'item_start_publish' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'item_end_publish' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'item_approve' => [
                'type' => 'INT',
                'constraint'     => 1,
            ],
            'item_publish' => [
                'type' => 'INT',
                'constraint'     => 1,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
    ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('anj_banner_item');
    }

    public function down()
    {
        $this->forge->dropTable('anj_banner_item');
    }
}