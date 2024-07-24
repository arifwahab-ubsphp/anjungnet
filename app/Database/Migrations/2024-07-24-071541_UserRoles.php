<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserRoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'usrroles_roleid' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'       => false,
                'auto_increment' => false
            ],
            'usrroles_nokp' => [
                'type'           => 'VARCHAR',
                'constraint'     => 15,
                'null'       => false,
                'auto_increment' => false
            ],
            
        ]);
        $this->forge->addKey(['usrroles_roleid', 'usrroles_nokp'], true);
        $this->forge->createTable('user_roles');
    }

    public function down()
    {
        $this->forge->dropTable('user_roles');
    }
}
