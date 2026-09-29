<?php

namespace App\Controllers;

use App\Models\UserModel;

class Pages extends BaseController
{
    public function profile(): string
    {
        return view('pages/profile', [
            'title'       => 'Profile',
            'currentPage' => 'profile',
            'user'        => (new UserModel())->demoUser(),
        ]);
    }

    public function about(): string
    {
        return view('pages/about', [
            'title'       => 'About',
            'currentPage' => 'about',
        ]);
    }
}
