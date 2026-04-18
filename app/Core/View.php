<?php

declare(strict_types=1);

namespace App\Core;

final class View
{
    public static function render(string $view, array $data = []): void
    {
        $path = VIEW_PATH . '/' . str_replace('.', '/', $view) . '.php';
        if (!is_file($path)) {
            http_response_code(404);
            echo 'View not found.';
            return;
        }

        extract($data, EXTR_SKIP);
        require VIEW_PATH . '/layouts/header.php';
        require $path;
        require VIEW_PATH . '/layouts/footer.php';
    }
}
