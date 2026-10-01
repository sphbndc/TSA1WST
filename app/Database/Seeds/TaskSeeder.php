<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $createdAt = '2026-09-29 08:00:00';
        $tasks = [
            ['title' => 'Networking 2: SW 2', 'status' => 'pending', 'task_date' => '2026-10-01', 'created_at' => $createdAt],
            ['title' => 'Networking 2: Formative 2', 'status' => 'pending', 'task_date' => '2026-10-01', 'created_at' => $createdAt],
            ['title' => 'Networking 2: Technical Assessment 4', 'status' => 'completed', 'task_date' => '2026-10-01', 'created_at' => $createdAt],
            ['title' => 'Networking 2: Technical Assessment 5', 'status' => 'completed', 'task_date' => '2026-10-01', 'created_at' => $createdAt],
            ['title' => 'Networking 2: AI-Assisted Module 4-5', 'status' => 'completed', 'task_date' => '2026-10-01', 'created_at' => $createdAt],
            ['title' => 'IT0035: Summative Assessment 1', 'status' => 'completed', 'task_date' => '2026-09-29', 'created_at' => $createdAt],
            ['title' => 'IT0049: TSA1', 'status' => 'pending', 'task_date' => '2026-09-30', 'created_at' => $createdAt],
            ['title' => 'Networking 2: Summative Assessment 2', 'status' => 'pending', 'task_date' => '2026-10-01', 'created_at' => $createdAt],
            ['title' => 'IT0037: Title Proposal', 'status' => 'pending', 'task_date' => '2026-10-05', 'created_at' => $createdAt],
            ['title' => 'Networking 2: CCST', 'status' => 'pending', 'task_date' => '2026-10-05', 'created_at' => $createdAt],
        ];

        if ($this->db->table('tasks')->countAllResults() === 0) {
            $this->db->table('tasks')->insertBatch($tasks);
        }

        if ($this->db->table('users')->countAllResults() === 0) {
            $this->db->table('users')->insert([
                'username'   => 'joseph',
                'full_name'  => 'Joseph',
                'email'      => 'joseph@example.com',
                'password'   => password_hash('Today2026!', PASSWORD_DEFAULT),
                'created_at' => $createdAt,
            ]);
        }
    }
}
