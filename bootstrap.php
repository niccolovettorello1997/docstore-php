<?php
// bootstrap.php - minimal env loader + DI placeholder

$baseDir = __DIR__;

// Simple .env loader (no dependencies)
$envFile = $baseDir . '/.env';

if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) continue;
        [$k, $v] = array_map('trim', explode('=', $line, 2) + [null, null]);
        if ($k !== null && getenv($k) === false) {
            // strip quotes
            $v = preg_replace('/^"(.*)"$/', '$1', $v);
            putenv("$k=$v");
            $_ENV[$k] = $v;
        }
    }
}

// Minimal container placeholder (you will expand it later)
if (!function_exists('container')) {
    function container(): array {
        static $c = [];
        return $c;
    }
}
