<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Url;
use App\Core\Validator;
use App\Models\Car;
use App\Models\Category;
use App\Models\Office;
use App\Models\Reservation;
use App\Models\User;

final class AdminController extends Controller
{
    public function dashboard(): void
    {
        $this->view('admin.dashboard', [
            'counts' => [
                'users' => count((new User())->allNonAdmin()),
                'categories' => count((new Category())->all()),
                'cars' => count((new Car())->all()),
                'reservations' => count((new Reservation())->all()),
            ],
        ]);
    }

    public function members(): void
    {
        $this->view('admin.members', ['members' => (new User())->all()]);
    }

    public function memberStore(): void
    {
        $data = [
            'user_name' => trim((string) $this->input('user_name')),
            'fullname' => trim((string) $this->input('fullname')),
            'email' => trim((string) $this->input('email')),
            'password' => (string) $this->input('password'),
            'role' => (string) $this->input('role', 'customer'),
        ];

        $errors = Validator::required($data, ['user_name', 'fullname', 'email', 'password']);
        if ($errors !== []) {
            $this->redirect(Url::to('admin/members'));
        }

        $userModel = new User();
        $exists = $userModel->findByUsername($data['user_name']);
        if ($exists === null) {
            $userModel->createByAdmin($data);
        }

        $this->redirect(Url::to('admin/members'));
    }

    public function memberEdit(array $params): void
    {
        $id = (int) ($params['id'] ?? 0);
        $member = (new User())->findById($id);
        if ($member === null) {
            $this->redirect(Url::to('admin/members'));
        }

        $this->view('admin.member-edit', ['member' => $member]);
    }

    public function memberUpdate(array $params): void
    {
        $id = (int) ($params['id'] ?? 0);
        $data = [
            'user_name' => trim((string) $this->input('user_name')),
            'fullname' => trim((string) $this->input('fullname')),
            'email' => trim((string) $this->input('email')),
            'password' => (string) $this->input('password', ''),
            'role' => (string) $this->input('role', 'customer'),
        ];

        $errors = Validator::required($data, ['user_name', 'fullname', 'email']);
        if ($errors !== []) {
            $this->redirect(Url::to('admin/members/' . $id . '/edit'));
        }

        (new User())->updateByAdmin($id, $data);
        $this->redirect(Url::to('admin/members'));
    }

    public function memberDelete(array $params): void
    {
        $id = (int) ($params['id'] ?? 0);
        $auth = \App\Core\Auth::user();
        if ($auth !== null && $id === (int) $auth['user_id']) {
            $this->redirect(Url::to('admin/members'));
        }

        (new User())->deleteById($id);
        $this->redirect(Url::to('admin/members'));
    }

    public function categories(): void
    {
        $this->view('admin.categories', ['categories' => (new Category())->all()]);
    }

    public function categoryStore(): void
    {
        $data = [
            'category_name' => trim((string) $this->input('category_name')),
            'description' => trim((string) $this->input('description')),
            'ordering' => (int) $this->input('ordering', 0),
        ];
        $errors = Validator::required($data, ['category_name', 'description']);
        if ($errors === []) {
            (new Category())->create($data);
        }
        $this->redirect(Url::to('admin/categories'));
    }

    public function items(): void
    {
        $this->view('admin.items', ['items' => (new Car())->all(), 'categories' => (new Category())->all(), 'offices' => (new Office())->all()]);
    }

    public function itemStore(): void
    {
        $user = \App\Core\Auth::user();
        $payload = [
            'model' => trim((string) $this->input('model')),
            'description' => trim((string) $this->input('description')),
            'price' => (int) $this->input('price', 0),
            'status' => (int) $this->input('status', 0),
            'country_made' => trim((string) $this->input('country_made')),
            'plate_id' => (int) $this->input('plate_id', 0),
            'avatar' => trim((string) $this->input('avatar', '')),
            'cat_id' => (int) $this->input('cat_id', 0),
            'member' => (int) ($user['user_id'] ?? 0),
            'office_id' => (int) $this->input('office_id', 0),
        ];
        (new Car())->create($payload);
        $this->redirect(Url::to('admin/items'));
    }

    public function offices(): void
    {
        $this->view('admin.offices', ['offices' => (new Office())->all(), 'members' => (new User())->allNonAdmin()]);
    }

    public function officeStore(): void
    {
        $data = [
            'office_name' => trim((string) $this->input('office_name')),
            'location' => trim((string) $this->input('location')),
            'mgr_ssn' => (int) $this->input('mgr_ssn', 0),
        ];
        (new Office())->create($data);
        $this->redirect(Url::to('admin/offices'));
    }

    public function payments(): void
    {
        $this->view('admin.payments', ['payments' => (new Reservation())->all()]);
    }
}
