<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Comment extends Model
{
    public function byCar(int $carId): array
    {
        $stmt = $this->db->prepare(
            'SELECT c.comment, c.c_date, u.user_name
             FROM comments c
             JOIN users u ON u.user_id = c.user_id
             WHERE c.car_id = :car_id
             ORDER BY c.c_id DESC'
        );
        $stmt->execute(['car_id' => $carId]);
        return $stmt->fetchAll();
    }

    public function create(int $carId, int $userId, string $comment): void
    {
        $stmt = $this->db->prepare('INSERT INTO comments(comment, c_date, car_id, user_id) VALUES (:comment, CURDATE(), :car_id, :user_id)');
        $stmt->execute([
            'comment' => $comment,
            'car_id' => $carId,
            'user_id' => $userId,
        ]);
    }
}
