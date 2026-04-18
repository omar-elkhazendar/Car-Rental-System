<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Car extends Model
{
    public function all(): array
    {
        $sql = 'SELECT c.*, cat.category_name, u.user_name, o.office_name
                FROM car c
                LEFT JOIN category cat ON cat.category_id = c.cat_id
                LEFT JOIN users u ON u.user_id = c.member
                LEFT JOIN office o ON o.office_id = c.office_id
                ORDER BY c.Car_ID DESC';
        return $this->db->query($sql)->fetchAll();
    }

    public function byCategory(int $categoryId): array
    {
        $stmt = $this->db->prepare('SELECT * FROM car WHERE cat_id = :cat ORDER BY Car_ID DESC');
        $stmt->execute(['cat' => $categoryId]);
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM car WHERE Car_ID = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    public function search(string $term): array
    {
        $stmt = $this->db->prepare('SELECT * FROM car WHERE Model LIKE :term OR description LIKE :term OR country_made LIKE :term');
        $stmt->execute(['term' => '%' . $term . '%']);
        return $stmt->fetchAll();
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO car(Model, description, price, status, country_made, date, Plate_ID, avatar, approve, cat_id, member, office_id)
             VALUES (:model, :description, :price, :status, :country, CURDATE(), :plate, :avatar, 1, :cat, :member, :office)'
        );
        $stmt->execute([
            'model' => $data['model'],
            'description' => $data['description'],
            'price' => (int) $data['price'],
            'status' => (int) ($data['status'] ?? 0),
            'country' => $data['country_made'],
            'plate' => (int) $data['plate_id'],
            'avatar' => $data['avatar'] ?? '',
            'cat' => (int) $data['cat_id'],
            'member' => (int) $data['member'],
            'office' => (int) $data['office_id'],
        ]);
    }
}
