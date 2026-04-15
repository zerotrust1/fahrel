<?php

use App\Http\Controllers\GuestbookController;
use Illuminate\Support\Facades\Route;
use App\Models\Guestbook;

/*
|--------------------------------------------------------------------------
| Web Routes - Integrated Environment Support
|--------------------------------------------------------------------------
*/

// Admin Subdomain Routing (Production)
Route::domain('admin.mochammadfahrelputraardiansyah.my.id')->group(function () {
    Route::get('/', [GuestbookController::class, 'admin'])->name('admin.index');
});

// Main Landing Page Route - Always ensure $guests is passed
Route::get('/', [GuestbookController::class, 'index'])->name('welcome');

// Guestbook Actions (Integrated CRUD)
Route::post('/guestbook/store', [GuestbookController::class, 'store'])->name('guestbook.store');
Route::delete('/guestbook/{id}', [GuestbookController::class, 'destroy'])->name('guestbook.destroy');

// Public Guestbook Alias
Route::get('/guestbook', [GuestbookController::class, 'index'])->name('guestbook.index');
