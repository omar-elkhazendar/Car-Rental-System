<?php

declare(strict_types=1);

use App\Core\Router;

require dirname(__DIR__) . '/app/bootstrap.php';

try {
    $router = new Router();
    $routes = require dirname(__DIR__) . '/config/routes.php';

    foreach ($routes as $route) {
        [$method, $path, $handler, $middleware] = $route + [null, null, null, []];
        $router->add((string) $method, (string) $path, $handler, (array) $middleware);
    }

    $router->dispatch($_SERVER['REQUEST_METHOD'] ?? 'GET', $_SERVER['REQUEST_URI'] ?? '/');
} catch (\Throwable $e) {
    http_response_code(500);
    $msg = htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    echo '<!doctype html><html><head><meta charset="utf-8"><title>Project Error</title><style>body{font-family:Segoe UI,Arial,sans-serif;background:#f5f5f5;margin:0}.box{max-width:900px;margin:40px auto;background:#fff;padding:24px;border-radius:12px;border:1px solid #ddd}.err{background:#fff1f2;border:1px solid #fecdd3;color:#9f1239;padding:12px;border-radius:8px}.ok{background:#eff6ff;border:1px solid #bfdbfe;padding:12px;border-radius:8px;margin-top:12px}</style></head><body><div class="box"><h1>Project is not running yet</h1><p class="err">' . $msg . '</p><div class="ok"><b>Fix steps:</b><ol><li>Start MySQL and Apache in XAMPP.</li><li>Import <code>car_rental.sql</code> from phpMyAdmin.</li><li>Check <code>config/database.php</code> for username/password/port.</li><li>Refresh the page.</li></ol></div></div></body></html>';
}
