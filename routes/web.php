<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    $books = Book::limit(8)->get();
    return view('welcome', compact('books'));
})->name('welcome');
Route::get('/library', function () {
    $books = Book::all();
    return view('pages.library', compact('books'));
})->name('library');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/profile', function () {
    return view('pages.profile.index');
})->name('profile.index');
Route::get('/profile/edit', function () {
    return view('pages.profile.edit');
})->name('profile.edit');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
    Route::delete('/carts/{id}', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::post('/carts/{id}', [CartController::class, 'update'])->name('carts.update');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
