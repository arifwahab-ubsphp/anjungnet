<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Files extends Migration
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
            'nama_file' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'jenis_file' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'parent' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'status_file' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'uploaded_file' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'created_by' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'updated_by' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('anj_files');
    }

    public function down()
    {
        $this->forge->dropTable('anj_files');
    }
}