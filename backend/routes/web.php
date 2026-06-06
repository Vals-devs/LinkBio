<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    // Trigger fresh build to load new environment variables
    return 'Routing is working perfectly!';
});

Route::get('/run-migrations', function () {
    if (request('key') !== 'ival_secret_key_123') {
        return response()->json(['status' => 'unauthorized'], 401);
    }
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
        return response()->json([
            'status' => 'success',
            'output' => \Illuminate\Support\Facades\Artisan::output()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});

Route::get('/test-db-config', function () {
    if (request('key') !== 'ival_secret_key_123') {
        return response()->json(['status' => 'unauthorized'], 401);
    }
    return response()->json([
        'pgsql' => config('database.connections.pgsql'),
        'db_url' => env('DATABASE_URL') ? 'set' : 'not set',
        'db_url_value' => env('DATABASE_URL') ? substr(env('DATABASE_URL'), 0, 30) . '...' : null,
    ]);
});

