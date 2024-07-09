<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Banner extends Migration
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
            'banner_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'banner_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'banner_approve' => [
                'type' => 'INT',
                'constraint'     => 1,
            ],
            'banner_publish' => [
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
        $this->forge->createTable('anj_banner');
    }

    public function down()
    {
        $this->forge->dropTable('anj_banner');
    }
}