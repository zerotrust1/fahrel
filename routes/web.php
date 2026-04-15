<?php

use App\Http\Controllers\GuestbookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Production Hardened
|--------------------------------------------------------------------------
*/

// Flexible Admin Routing
// Try subdomain first, if fails, the /admin fallback below will catch it
Route::domain('admin.mochammadfahrelputraardiansyah.my.id')->group(function () {
    Route::get('/', [GuestbookController::class, 'admin'])->name('admin.index');
});

// Main Landing Page
Route::get('/', [GuestbookController::class, 'index'])->name('welcome');

// Development/Production Fallback for Admin (Safe for IT Support)
Route::get('/admin', [GuestbookController::class, 'admin'])->name('admin.dev');

// CRUD Operations
Route::post('/guestbook/store', [GuestbookController::class, 'store'])->name('guestbook.store');
Route::delete('/guestbook/{id}', [GuestbookController::class, 'destroy'])->name('guestbook.destroy');
