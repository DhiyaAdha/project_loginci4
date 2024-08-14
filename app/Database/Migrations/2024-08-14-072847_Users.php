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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,  // Mengizinkan NULL
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,  // Mengizinkan NULL
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,  // Mengizinkan NULL
            ],
            'level' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,  // Mengizinkan NULL
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,  // Mengizinkan NULL
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,  // Mengizinkan NULL
            ],
        ]);

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('users'); // Membuat tabel 'users'
    }

    public function down()
    {
        $this->forge->dropTable('users'); // Menghapus tabel 'users'
    }
}
