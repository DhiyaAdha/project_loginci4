<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'level' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('Users');
    }

    public function down()
    {
        $this->forge->dropTable('Users');
    }
}
