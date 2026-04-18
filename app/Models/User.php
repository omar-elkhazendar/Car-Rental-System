<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class User extends Model
{
    public function all(): array
    {
        return $this->db->query('SELECT * FROM users ORDER BY user_id DESC')->fetchAll();
    }

    public function findByUsername(string $username): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE user_name = :username LIMIT 1');
        $stmt->execute(['username' => $username]);
        return $stmt->fetch() ?: null;
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE user_id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    public function createCustomer(array $data): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO users(user_name, user_password, Fullname, user_email, user_group_id, approval, stat, user_date)
             VALUES (:user_name, :user_password, :fullname, :email, 0, 1, :stat, CURDATE())'
        );
        $stmt->execute([
            'user_name' => $data['user_name'],
            'user_password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'stat' => 'C',
        ]);
        return (int) $this->db->lastInsertId();
    }

    public function createByAdmin(array $data): int
    {
        $role = (string) ($data['role'] ?? 'customer');
        $map = [
            'admin' => ['group_id' => 1, 'stat' => 'A'],
            'employee' => ['group_id' => 0, 'stat' => 'E'],
            'customer' => ['group_id' => 0, 'stat' => 'C'],
        ];
        $roleData = $map[$role] ?? $map['customer'];

        $stmt = $this->db->prepare(
            'INSERT INTO users(user_name, user_password, Fullname, user_email, user_group_id, approval, stat, user_date)
             VALUES (:user_name, :user_password, :fullname, :email, :group_id, 1, :stat, CURDATE())'
        );
        $stmt->execute([
            'user_name' => $data['user_name'],
            'user_password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'group_id' => $roleData['group_id'],
            'stat' => $roleData['stat'],
        ]);

        return (int) $this->db->lastInsertId();
    }

    public function allNonAdmin(): array
    {
        return $this->db->query("SELECT * FROM users WHERE user_group_id <> 1 ORDER BY user_id DESC")->fetchAll();
    }

    public function updateByAdmin(int $id, array $data): void
    {
        $role = (string) ($data['role'] ?? 'customer');
        $map = [
            'admin' => ['group_id' => 1, 'stat' => 'A'],
            'employee' => ['group_id' => 0, 'stat' => 'E'],
            'customer' => ['group_id' => 0, 'stat' => 'C'],
        ];
        $roleData = $map[$role] ?? $map['customer'];

        $sql = 'UPDATE users SET user_name = :user_name, Fullname = :fullname, user_email = :email, user_group_id = :group_id, stat = :stat';
        $params = [
            'user_name' => $data['user_name'],
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'group_id' => $roleData['group_id'],
            'stat' => $roleData['stat'],
            'id' => $id,
        ];

        if (!empty($data['password'])) {
            $sql .= ', user_password = :password';
            $params['password'] = password_hash((string) $data['password'], PASSWORD_DEFAULT);
        }

        $sql .= ' WHERE user_id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
    }

    public function deleteById(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM users WHERE user_id = :id');
        $stmt->execute(['id' => $id]);
    }

    public function updateProfile(int $id, string $fullname, string $email): void
    {
        $stmt = $this->db->prepare('UPDATE users SET Fullname = :fullname, user_email = :email WHERE user_id = :id');
        $stmt->execute([
            'fullname' => $fullname,
            'email' => $email,
            'id' => $id,
        ]);
    }

    public function updatePassword(int $id, string $plainPassword): void
    {
        $stmt = $this->db->prepare('UPDATE users SET user_password = :password WHERE user_id = :id');
        $stmt->execute([
            'password' => password_hash($plainPassword, PASSWORD_DEFAULT),
            'id' => $id,
        ]);
    }

    public function upgradePassword(int $id, string $plainPassword): void
    {
        $stmt = $this->db->prepare('UPDATE users SET user_password = :password WHERE user_id = :id');
        $stmt->execute([
            'password' => password_hash($plainPassword, PASSWORD_DEFAULT),
            'id' => $id,
        ]);
    }
}
