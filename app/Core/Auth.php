<?php

declare(strict_types=1);

namespace App\Core;

use App\Models\User;

final class Auth
{
    public static function user(): ?array
    {
        return Session::get('auth_user');
    }

    public static function check(): bool
    {
        return self::user() !== null;
    }

    public static function loginByCredentials(string $username, string $password): bool
    {
        $userModel = new User();
        $user = $userModel->findByUsername($username);
        if ($user === null) {
            return false;
        }

        $isLegacySha1 = strlen((string) $user['user_password']) === 40;
        $passwordOk = $isLegacySha1
            ? sha1($password) === $user['user_password']
            : password_verify($password, $user['user_password']);

        if (!$passwordOk) {
            return false;
        }

        if ($isLegacySha1) {
            $userModel->upgradePassword((int) $user['user_id'], $password);
            $user['user_password'] = $userModel->findById((int) $user['user_id'])['user_password'] ?? $user['user_password'];
        }

        Session::regenerate();
        Session::set('auth_user', [
            'user_id' => (int) $user['user_id'],
            'user_name' => $user['user_name'],
            'fullname' => $user['Fullname'],
            'email' => $user['user_email'],
            'role' => self::roleFromRow($user),
        ]);

        return true;
    }

    public static function registerCustomer(array $data): int
    {
        $userModel = new User();
        return $userModel->createCustomer($data);
    }

    public static function logout(): void
    {
        Session::destroy();
    }

    public static function refreshUserSession(int $userId): void
    {
        $user = (new User())->findById($userId);
        if ($user === null) {
            return;
        }

        Session::set('auth_user', [
            'user_id' => (int) $user['user_id'],
            'user_name' => $user['user_name'],
            'fullname' => $user['Fullname'],
            'email' => $user['user_email'],
            'role' => self::roleFromRow($user),
        ]);
    }

    public static function requireRole(array $roles): void
    {
        $user = self::user();
        if ($user === null || !in_array($user['role'], $roles, true)) {
            header('Location: ' . Url::to('login'));
            exit;
        }
    }

    private static function roleFromRow(array $row): string
    {
        if ((int) ($row['user_group_id'] ?? 0) === 1 || ($row['stat'] ?? '') === 'A') {
            return 'admin';
        }

        if (($row['stat'] ?? '') === 'E') {
            return 'employee';
        }

        return 'customer';
    }
}
