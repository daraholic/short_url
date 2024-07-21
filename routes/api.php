<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;

Route::post('/shorturl', [ShortUrlController::class, 'create']);
Route::get('/short/{code}', [ShortUrlController::class, 'show']);