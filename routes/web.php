<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    $books = Book::all();
    return view('welcome', compact('books'));
})->name('welcome');


Route::get('/about', function () {
    return view('pages.about');
})->name('about');


Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sales', SaleController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
    Route::delete('/carts/{id}', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::post('/carts/{id}', [CartController::class, 'update'])->name('carts.update');
    Route::post('/carts/checkout', [CartController::class, 'checkout'])->name('carts.checkout');
    Route::resource('wallets', WalletController::class);
    Route::resource('sales', SaleController::class)->only('store');
    Route::get('/libraries', function () {
        //mengambil seluruh info buku yang sudah dibeli
        $books = Book::join('sales', 'books.id', '=', 'sales.book_id')
            ->where('sales.user_id', Auth::id())
            ->where('sales.status', 'completed')
            ->select('books.*') // select all columns from books
            ->get();

        return view('pages.libraries.index', compact('books'));
    })->name('libraries.index');

    Route::get('/libraries/{book}', function (Book $book) {
        return view('pages.libraries.show', compact('book'));
    })->name('libraries.show');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
