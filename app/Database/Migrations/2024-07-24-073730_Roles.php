<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'roleid' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'       => false,
                'auto_increment' => true
            ],
            'role_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'role_status' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'role_updateby' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                                
            ],
            'role_date_update' => [
                'type'           => 'DATETIME',
                'null' => true
            ],
            'role_date_created' => [
                'type'           => 'VARCHAR',
                'null' => true
            ],
            
        ]);
        $this->forge->addKey('roleid', true);
        $this->forge->createTable('roles');
    }

    public function down()
    {
        $this->forge->dropTable('user_roles');
    }
}
