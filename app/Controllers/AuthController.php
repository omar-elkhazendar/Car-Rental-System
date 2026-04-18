<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Url;
use App\Core\Validator;
use App\Models\User;

final class AuthController extends Controller
{
    public function showLogin(): void
    {
        $this->view('auth.login');
    }

    public function login(): void
    {
        $username = trim((string) $this->input('username', ''));
        $password = (string) $this->input('password', '');
        if (!Auth::loginByCredentials($username, $password)) {
            $this->view('auth.login', ['error' => 'Invalid credentials']);
            return;
        }

        $role = Auth::user()['role'];
        if ($role === 'admin') {
            $this->redirect(Url::to('admin'));
        }
        $this->redirect(Url::to());
    }

    public function showRegister(): void
    {
        $this->view('auth.register');
    }

    public function register(): void
    {
        $data = [
            'user_name' => trim((string) $this->input('username', '')),
            'fullname' => trim((string) $this->input('fullname', '')),
            'email' => trim((string) $this->input('email', '')),
            'password' => (string) $this->input('password', ''),
        ];

        $errors = Validator::required($data, ['user_name', 'fullname', 'email', 'password']);
        if ($errors !== []) {
            $this->view('auth.register', ['errors' => $errors, 'old' => $data]);
            return;
        }

        $existing = (new User())->findByUsername($data['user_name']);
        if ($existing !== null) {
            $this->view('auth.register', ['error' => 'Username already exists', 'old' => $data]);
            return;
        }

        Auth::registerCustomer($data);
        Auth::loginByCredentials($data['user_name'], $data['password']);
        $this->redirect(Url::to());
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect(Url::to('login'));
    }
}
