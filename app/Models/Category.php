<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Category extends Model
{
    public function all(): array
    {
        return $this->db->query('SELECT * FROM category ORDER BY ordering ASC')->fetchAll();
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare('INSERT INTO category(category_name, description, ordering) VALUES (:name, :description, :ordering)');
        $stmt->execute([
            'name' => $data['category_name'],
            'description' => $data['description'],
            'ordering' => (int) $data['ordering'],
        ]);
    }
}
