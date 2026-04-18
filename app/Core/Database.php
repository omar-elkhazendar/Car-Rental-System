<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;
use RuntimeException;

final class Database
{
    private static array $config = [];
    private static ?PDO $connection = null;
    private static string $lastError = '';

    public static function init(array $config): void
    {
        self::$config = $config;
    }

    public static function connection(): PDO
    {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

        $host = (string) (self::$config['host'] ?? 'localhost');
        $dbName = (string) (self::$config['dbname'] ?? '');
        $charset = (string) (self::$config['charset'] ?? 'utf8mb4');
        $ports = self::candidatePorts();

        foreach ($ports as $port) {
            try {
                $dsn = sprintf(
                    'mysql:host=%s;port=%d;dbname=%s;charset=%s',
                    $host,
                    $port,
                    $dbName,
                    $charset
                );

                self::$connection = new PDO($dsn, (string) self::$config['user'], (string) self::$config['pass'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
                self::$lastError = '';
                return self::$connection;
            } catch (PDOException $e) {
                self::$lastError = $e->getMessage();
            }
        }

        throw new RuntimeException(
            'Database connection failed. Tried ports: ' . implode(', ', $ports) . '. Last error: ' . self::$lastError
        );
    }

    private static function candidatePorts(): array
    {
        $ports = [];
        if (isset(self::$config['port'])) {
            $ports[] = (int) self::$config['port'];
        }
        if (isset(self::$config['fallback_ports']) && is_array(self::$config['fallback_ports'])) {
            foreach (self::$config['fallback_ports'] as $fallbackPort) {
                $ports[] = (int) $fallbackPort;
            }
        }

        $ports = array_values(array_unique(array_filter($ports, static fn (int $p): bool => $p > 0)));
        return $ports !== [] ? $ports : [3306, 3304];
    }
}
