<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAuthenticationAndSoftDeleteFields extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => '',
            ],
        ]);

        $this->forge->addColumn('tasks', [
            'is_archived' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
                'null'       => false,
            ],
        ]);

        $this->db->table('users')->where('username', 'joseph')->update([
            'password' => password_hash('Today2026!', PASSWORD_DEFAULT),
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tasks', 'is_archived');
        $this->forge->dropColumn('users', 'password');
    }
}
