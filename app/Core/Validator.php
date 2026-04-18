<?php

declare(strict_types=1);

namespace App\Core;

final class Validator
{
    public static function required(array $data, array $fields): array
    {
        $errors = [];
        foreach ($fields as $field) {
            if (!isset($data[$field]) || trim((string) $data[$field]) === '') {
                $errors[$field] = 'This field is required.';
            }
        }
        return $errors;
    }
}
