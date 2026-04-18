<?php

declare(strict_types=1);

use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\UserController;

return [
    ['GET', '/', [UserController::class, 'home']],
    ['GET', '/about', [UserController::class, 'about']],
    ['GET', '/login', [AuthController::class, 'showLogin']],
    ['POST', '/login', [AuthController::class, 'login']],
    ['GET', '/register', [AuthController::class, 'showRegister']],
    ['POST', '/register', [AuthController::class, 'register']],
    ['POST', '/logout', [AuthController::class, 'logout'], [['admin', 'employee', 'customer']]],

    ['GET', '/category/{id}', [UserController::class, 'category'], [['admin', 'employee', 'customer']]],
    ['GET', '/item/{id}', [UserController::class, 'item'], [['admin', 'employee', 'customer']]],
    ['POST', '/item/{id}/comment', [UserController::class, 'commentStore'], [['admin', 'employee', 'customer']]],
    ['GET', '/search', [UserController::class, 'search'], [['admin', 'employee', 'customer']]],
    ['GET', '/profile', [UserController::class, 'profile'], [['admin', 'employee', 'customer']]],
    ['POST', '/profile', [UserController::class, 'profileUpdate'], [['admin', 'employee', 'customer']]],
    ['GET', '/reserve/{id}', [UserController::class, 'reserveForm'], [['admin', 'employee', 'customer']]],
    ['POST', '/reserve', [UserController::class, 'reserveStore'], [['admin', 'employee', 'customer']]],

    ['GET', '/admin', [AdminController::class, 'dashboard'], [['admin']]],
    ['GET', '/admin/members', [AdminController::class, 'members'], [['admin']]],
    ['POST', '/admin/members', [AdminController::class, 'memberStore'], [['admin']]],
    ['GET', '/admin/members/{id}/edit', [AdminController::class, 'memberEdit'], [['admin']]],
    ['POST', '/admin/members/{id}/edit', [AdminController::class, 'memberUpdate'], [['admin']]],
    ['POST', '/admin/members/{id}/delete', [AdminController::class, 'memberDelete'], [['admin']]],
    ['GET', '/admin/categories', [AdminController::class, 'categories'], [['admin']]],
    ['POST', '/admin/categories', [AdminController::class, 'categoryStore'], [['admin']]],
    ['GET', '/admin/items', [AdminController::class, 'items'], [['admin']]],
    ['POST', '/admin/items', [AdminController::class, 'itemStore'], [['admin']]],
    ['GET', '/admin/offices', [AdminController::class, 'offices'], [['admin']]],
    ['POST', '/admin/offices', [AdminController::class, 'officeStore'], [['admin']]],
    ['GET', '/admin/payments', [AdminController::class, 'payments'], [['admin']]],
];
