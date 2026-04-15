<?php

use App\Http\Controllers\GuestbookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Production Hardened with VPN Protection
|--------------------------------------------------------------------------
*/

// Admin Subdomain Routing (Production) - Protected by VPN
Route::domain('admin.mochammadfahrelputraardiansyah.my.id')->middleware('vpnaccess')->group(function () {
    Route::get('/', [GuestbookController::class, 'admin'])->name('admin.index');
});

// Admin Route for Development (Temporary Access) - Protected by VPN
Route::get('/admin', [GuestbookController::class, 'admin'])->name('admin.dev')->middleware('vpnaccess');

// Main Landing Page
Route::get('/', [GuestbookController::class, 'index'])->name('welcome');

// CRUD Operations
Route::post('/guestbook/store', [GuestbookController::class, 'store'])->name('guestbook.store');
Route::delete('/guestbook/{id}', [GuestbookController::class, 'destroy'])->name('guestbook.destroy');

// Fallback for public index if accessed directly
Route::get('/guestbook', [GuestbookController::class, 'index'])->name('guestbook.index');
