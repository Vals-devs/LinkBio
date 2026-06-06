<?php
try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    header('Content-Type: text/plain');
    echo "Fatal Error caught in Vercel entrypoint:\n";
    echo $e->getMessage() . "\n\n";
    echo "Stack Trace:\n";
    echo $e->getTraceAsString();
}
