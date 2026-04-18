<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Office extends Model
{
    public function all(): array
    {
        return $this->db->query('SELECT o.*, u.user_name as manager_name FROM office o LEFT JOIN users u ON u.user_id = o.mgr_ssn ORDER BY office_id DESC')->fetchAll();
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare('INSERT INTO office(office_name, location, mgr_ssn) VALUES (:name, :location, :mgr)');
        $stmt->execute([
            'name' => $data['office_name'],
            'location' => $data['location'],
            'mgr' => (int) $data['mgr_ssn'],
        ]);
    }
}
