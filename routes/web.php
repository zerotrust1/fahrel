<?php

use App\Http\Controllers\GuestbookController;
use Illuminate\Support\Facades\Route;
use App\Models\Guestbook;

// Admin Subdomain Routing
Route::domain('admin.mochammadfahrelputraardiansyah.my.id')->group(function () {
    Route::get('/', [GuestbookController::class, 'admin'])->name('admin.index');
});

// Main Landing Page Route
Route::get('/', function() {
    try {
        $guests = Guestbook::latest()->get();
    } catch (\Exception $e) {
        $guests = collect([]);
    }
    return view('welcome', compact('guests'));
})->name('welcome');

// Guestbook Actions
Route::post('/guestbook', [GuestbookController::class, 'store'])->name('guestbook.store');
Route::delete('/guestbook/{guestbook}', [GuestbookController::class, 'destroy'])->name('guestbook.destroy');

// Public Guestbook Alias
Route::get('/guestbook', [GuestbookController::class, 'index'])->name('guestbook.index');
