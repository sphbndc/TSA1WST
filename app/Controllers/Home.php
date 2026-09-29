<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index(): string
    {
        $today = date('Y-m-d');

        return view('pages/today', [
            'title'       => 'Today',
            'currentPage' => 'today',
            'today'       => $today,
            'tasks'       => (new TaskModel())->forDate($today),
        ]);
    }
}
