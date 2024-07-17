<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
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
            'nama_menu' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
            'url_menu' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
            'parent' => [
                'type' => 'INT', 
                'constraint' => 11
            ],
            'icon' => [
                'type' => 'VARCHAR', 
                'constraint' => 50
            ],
            'susunan' => [
                'type' => 'INT', 
                'constraint' => 11
            ],
            'aras' => [
                'type' => 'INT', 
                'constraint' => 11
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('anj_menu');
        
    }

    public function down()
    {
        $this->forge->dropTable('anj_menu');
    }
}