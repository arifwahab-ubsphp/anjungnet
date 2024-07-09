<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SSO extends Migration
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
            'app_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'form_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'login_url' => [
               'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'login_action_url' => [
               'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'submit_type' => [
                'type' => 'INT',
                'constraint'     => 1,
            ],
            'app_status' => [
                'type' => 'INT',
                'constraint'     => 1,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('anj_sso');
    }

    public function down()
    {
        $this->forge->dropTable('anj_sso');
    }
}