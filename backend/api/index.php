<?php
// Force Symfony/Laravel request handler to treat the base path as '/' instead of '/api' on Vercel
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['PHP_SELF'] = '/index.php';

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    header('Content-Type: text/plain');
    echo "Fatal Error caught in Vercel entrypoint:\n";
    echo $e->getMessage() . "\n\n";
    echo "Stack Trace:\n";
    echo $e->getTraceAsString();
}
