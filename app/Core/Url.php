<?php

declare(strict_types=1);

namespace App\Core;

final class Url
{
    public static function base(): string
    {
        $config = require BASE_PATH . '/config/app.php';
        return rtrim((string) $config['base_path'], '/');
    }

    public static function to(string $path = ''): string
    {
        return self::base() . '/' . ltrim($path, '/');
    }

    public static function asset(string $path = ''): string
    {
        $base = self::base();
        return rtrim($base, '/') . '/assets/' . ltrim($path, '/');
    }

    public static function carImage(string $avatar, int $carId, string $model = 'Car'): string
    {
        $avatar = trim($avatar);
        if ($avatar !== '') {
            if (preg_match('#^https?://#i', $avatar) === 1) {
                return $avatar;
            }

            $local = BASE_PATH . '/Admin/uploads/' . $avatar;
            if (is_file($local)) {
                return '/DB Final project/Admin/uploads/' . rawurlencode($avatar);
            }
        }

        return self::to('car-image.php?id=' . urlencode((string) $carId) . '&model=' . urlencode($model));
    }
}
