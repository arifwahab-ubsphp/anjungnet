<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'userid' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'       => false,
                'auto_increment' => false
            ],
            'nokp' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'       => false,
                'auto_increment' => false
            ],
            'nok' => [
                'type'           => 'VARCHAR',
                'constraint'     => 15,
                'null'       => false,
                'auto_increment' => false
            ],
            'fname' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'       => false,                
            ],
            'user_pwd' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,                
            ],
            'user_salt' => [
                'type'           => 'VARCHAR',
                'constraint'     => 25,                
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'       => false,
                'auto_increment' => false
            ],
            'nama_ptj' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,                
            ],
            'ptj' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'nama_stesen' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'role' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'userstat' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'date_created' => [
                'type' => 'DATE',
                'null' => true
            ],
            'date_updated' => [
                'type' => 'DATE',
                'null' => true
            ],
            'lastlogin' => [
                'type' => 'DATETIME',
                'null' => true
            ]
            
        ]);
        $this->forge->addKey(['userid', 'nokp', 'nok'], true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
