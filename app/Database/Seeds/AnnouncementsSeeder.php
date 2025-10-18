<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'      => 'Welcome Back! New Term Starts',
                'content'    => 'Classes resume next week. Please review your schedules and course syllabi.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'System Maintenance',
                'content'    => 'Portal maintenance on Saturday 10 PM - 12 AM. Expect intermittent access.',
                'created_at' => date('Y-m-d H:i:s', time() - 3600),
            ],
        ];

        $this->db->table('announcements')->insertBatch($data);
    }
}
