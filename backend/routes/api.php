<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\ThemeController;

// Public Guest Routes
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

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/public/{username}', [PublicController::class, 'show']);
Route::post('/public/{username}/visit', [PublicController::class, 'trackVisit']);
Route::post('/public/click/{linkId}', [PublicController::class, 'trackClick']);

// Protected Authenticated Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me', [AuthController::class, 'me']);
    
    Route::put('/profile', [ProfileController::class, 'update']);
    
    Route::get('/links', [LinkController::class, 'index']);
    Route::post('/links', [LinkController::class, 'store']);
    Route::put('/links/{id}', [LinkController::class, 'update']);
    Route::delete('/links/{id}', [LinkController::class, 'destroy']);
    Route::put('/links/reorder', [LinkController::class, 'reorder']);
    
    Route::get('/analytics/summary', [AnalyticsController::class, 'summary']);

    Route::get('/theme', [ThemeController::class, 'show']);
    Route::put('/theme', [ThemeController::class, 'update']);

    Route::post('/ai/generate-bio', [AIController::class, 'generateBio']);
    Route::get('/ai/visitor-insight', [AIController::class, 'visitorInsight']);
    Route::post('/ai/suggest-layout', [AIController::class, 'suggestLayout']);
    Route::post('/ai/analyze-seo', [AIController::class, 'analyzeSeo']);
});
