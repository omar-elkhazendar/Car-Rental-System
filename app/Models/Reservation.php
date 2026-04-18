<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Reservation extends Model
{
    public function all(): array
    {
        $sql = 'SELECT r.*, c.Model, o.office_name
                FROM reservation r
                JOIN car c ON c.Car_ID = r.car_id
                LEFT JOIN office o ON o.office_id = r.office_id
                ORDER BY reserve_id DESC';
        return $this->db->query($sql)->fetchAll();
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO reservation(fullname, email, city, state, zipcode, card_name, card_number, start_rented_date, end_rented_date, office_id, car_id)
             VALUES (:fullname, :email, :city, :state, :zipcode, :card_name, :card_number, :start_date, :end_date, :office_id, :car_id)'
        );
        $stmt->execute([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipcode' => $data['zipcode'],
            'card_name' => $data['card_name'],
            'card_number' => $data['card_number'],
            'start_date' => $data['start_rented_date'],
            'end_date' => $data['end_rented_date'],
            'office_id' => (int) $data['office_id'],
            'car_id' => (int) $data['car_id'],
        ]);
    }
}
