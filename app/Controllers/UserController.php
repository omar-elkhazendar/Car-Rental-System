<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Url;
use App\Core\Validator;
use App\Models\Car;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Reservation;
use App\Models\User;

final class UserController extends Controller
{
    public function home(): void
    {
        $this->view('user.home', ['categories' => (new Category())->all()]);
    }

    public function about(): void
    {
        $this->view('user.about');
    }

    public function category(array $params): void
    {
        $categoryId = (int) ($params['id'] ?? 0);
        $this->view('user.category', ['items' => (new Car())->byCategory($categoryId)]);
    }

    public function item(array $params): void
    {
        $carId = (int) ($params['id'] ?? 0);
        $this->view('user.item', [
            'item' => (new Car())->find($carId),
            'comments' => (new Comment())->byCar($carId),
        ]);
    }

    public function commentStore(array $params): void
    {
        $carId = (int) ($params['id'] ?? 0);
        $comment = trim((string) $this->input('comment', ''));
        $user = Auth::user();
        if ($comment !== '' && $user !== null) {
            (new Comment())->create($carId, (int) $user['user_id'], $comment);
        }
        $this->redirect(Url::to('item/' . $carId));
    }

    public function search(): void
    {
        $term = trim((string) $this->input('q', ''));
        $results = $term === '' ? [] : (new Car())->search($term);
        $this->view('user.search', ['results' => $results, 'term' => $term]);
    }

    public function profile(): void
    {
        $sessionUser = Auth::user();
        $user = $sessionUser ? (new User())->findById((int) $sessionUser['user_id']) : null;
        $this->view('user.profile', ['user' => $user]);
    }

    public function profileUpdate(): void
    {
        $auth = Auth::user();
        if ($auth === null) {
            $this->redirect(Url::to('login'));
        }

        $fullname = trim((string) $this->input('fullname'));
        $email = trim((string) $this->input('email'));
        $password = (string) $this->input('password', '');

        $errors = Validator::required(['fullname' => $fullname, 'email' => $email], ['fullname', 'email']);
        if ($errors !== []) {
            $this->redirect(Url::to('profile'));
        }

        $userModel = new User();
        $userId = (int) $auth['user_id'];
        $userModel->updateProfile($userId, $fullname, $email);
        if ($password !== '') {
            $userModel->updatePassword($userId, $password);
        }

        Auth::refreshUserSession($userId);
        $this->redirect(Url::to('profile'));
    }

    public function reserveForm(array $params): void
    {
        $carId = (int) ($params['id'] ?? 0);
        $this->view('user.reserve', ['item' => (new Car())->find($carId)]);
    }

    public function reserveStore(): void
    {
        $data = [
            'fullname' => trim((string) $this->input('fullname')),
            'email' => trim((string) $this->input('email')),
            'city' => trim((string) $this->input('city')),
            'state' => trim((string) $this->input('state')),
            'zipcode' => trim((string) $this->input('zipcode')),
            'card_name' => trim((string) $this->input('card_name')),
            'card_number' => preg_replace('/\D+/', '', (string) $this->input('card_number')),
            'start_rented_date' => (string) $this->input('start_rented_date'),
            'end_rented_date' => (string) $this->input('end_rented_date'),
            'office_id' => (int) $this->input('office_id', 0),
            'car_id' => (int) $this->input('car_id', 0),
        ];
        $errors = Validator::required($data, ['fullname', 'email', 'city', 'state', 'zipcode', 'card_name', 'card_number', 'start_rented_date', 'end_rented_date', 'car_id']);
        if ($errors === []) {
            (new Reservation())->create($data);
            $this->redirect(Url::to('profile'));
        }
        $this->view('user.reserve', ['item' => (new Car())->find((int) $data['car_id']), 'errors' => $errors]);
    }
}
