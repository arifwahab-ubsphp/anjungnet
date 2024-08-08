<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Page extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'page_title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'page_description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'page_content' => [
                'type' => 'TEXT',
            ],
            'page_approve' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'page_publish' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('anj_page', true);

    }

    public function down()
    {
        $this->forge->dropTable('anj_page');
    }
}