<?php

declare(strict_types=1);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('VIEW_PATH', APP_PATH . '/Views');
define('STORAGE_PATH', BASE_PATH . '/storage');

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    if (!str_starts_with($class, $prefix)) {
        return;
    }

    $relative = substr($class, strlen($prefix));
    $relativePath = str_replace('\\', '/', $relative);
    $path = APP_PATH . '/' . $relativePath . '.php';
    if (is_file($path)) {
        require $path;
    }
});

$appConfig = require BASE_PATH . '/config/app.php';
$dbConfig = require BASE_PATH . '/config/database.php';

date_default_timezone_set($appConfig['timezone']);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_name($appConfig['session_name']);
    session_start();
}

App\Core\Database::init($dbConfig);
