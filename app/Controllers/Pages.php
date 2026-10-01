<?php

namespace App\Controllers;

use App\Models\UserModel;

class Pages extends BaseController
{
    public function profile(): string
    {
        $user = (new UserModel())->demoUser();

        return view('pages/profile', [
            'title'       => 'Profile',
            'currentPage' => 'profile',
            'user'        => $user,
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
