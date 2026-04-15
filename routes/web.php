<?php

use App\Http\Controllers\GuestbookController;
use Illuminate\Support\Facades\Route;
use App\Models\Guestbook;

/*
|--------------------------------------------------------------------------
| Web Routes - Real Server Optimized
|--------------------------------------------------------------------------
*/

// Admin Subdomain Routing (Production)
Route::domain('admin.mochammadfahrelputraardiansyah.my.id')->group(function () {
    Route::get('/', [GuestbookController::class, 'admin'])->name('admin.index');
});

// Admin Route for Development (Temporary Access)
Route::get('/admin', [GuestbookController::class, 'admin'])->name('admin.dev');

// Main Landing Page Route
Route::get('/', [GuestbookController::class, 'index'])->name('welcome');

// Guestbook Actions (Integrated CRUD)
Route::post('/guestbook/store', [GuestbookController::class, 'store'])->name('guestbook.store');
Route::delete('/guestbook/{id}', [GuestbookController::class, 'destroy'])->name('guestbook.destroy');

// Fallback for public index if accessed directly
Route::get('/guestbook', [GuestbookController::class, 'index'])->name('guestbook.index');
