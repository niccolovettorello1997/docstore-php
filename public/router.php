<?php
// public/router.php - built-in server router
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static files when present
$file = __DIR__ . $uri;
if ($uri !== '/' && file_exists($file) && is_file($file)) {
    return false;
}

// Route API prefix to api.php (placeholder)
if (strpos($uri, '/api/') === 0) {
    // temporary response for scaffolding
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'status' => 'ok',
        'message' => 'API entrypoint not implemented yet. This is a scaffold.',
        'path' => $uri
    ]);
    exit;
}

// Fallback to index page
require __DIR__ . '/index.php';
