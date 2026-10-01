<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (session()->get('userId')) {
            return redirect()->to('/tasks');
        }

        return view('auth/login', [
            'title'       => 'Log in',
            'currentPage' => 'login',
        ]);
    }

    public function attempt(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $data = ['title' => 'Log in', 'currentPage' => 'login'];
        $rules = [
            'username' => 'required|max_length[100]',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return view('auth/login', $data + ['validation' => $this->validator]);
        }

        $login = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');
        $user = (new UserModel())->findForLogin($login);

        if (! $user || ! password_verify($password, $user['password'])) {
            return view('auth/login', $data + [
                'loginError' => 'Username or password is incorrect.',
                'username'   => $login,
            ]);
        }

        session()->regenerate(true);
        session()->set([
            'userId'   => $user['id'],
            'username' => $user['username'],
        ]);

        return redirect()->to('/tasks')->with('success', 'You are logged in.');
    }

    public function logout(): \CodeIgniter\HTTP\RedirectResponse
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
