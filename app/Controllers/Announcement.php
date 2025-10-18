<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

class Announcement extends BaseController
{
    public function index()
    {
        // Use the model and order by newest first
        $model = new AnnouncementModel();
        $rows = $model->orderBy('created_at', 'DESC')->findAll();

        return view('announcements', [
            'announcements' => $rows,
        ]);
    }
}
