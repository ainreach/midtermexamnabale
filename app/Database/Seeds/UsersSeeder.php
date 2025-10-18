<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Bcrypt for 'password'
        $hash = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

        $data = [
            ['username' => 'student1', 'password_hash' => $hash, 'role' => 'student', 'created_at' => date('Y-m-d H:i:s')],
            ['username' => 'teacher1', 'password_hash' => $hash, 'role' => 'teacher', 'created_at' => date('Y-m-d H:i:s')],
            ['username' => 'admin1',   'password_hash' => $hash, 'role' => 'admin',   'created_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
