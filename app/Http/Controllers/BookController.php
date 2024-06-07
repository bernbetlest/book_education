<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('pages.dashboard.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // Validasi request
        $validatedData = $request->validated();

        // Inisialisasi variabel filename
        $filename = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $title = str_replace(' ', '_', $request->title);
            $filename = $title . '_' . time() . '.' . $image->getClientOriginalExtension();
            // Store new image
            $image->move(public_path('assets/images/books/'), $filename);
        }

        // Buat buku baru dengan data yang divalidasi
        Book::create([
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'publisher' => $validatedData['publisher'],
            'publication_date' => $validatedData['publication_date'],
            'price' => $validatedData['price'],
            'quantity' => $validatedData['quantity'],
            'image' => $filename,
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Book created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('pages.dashboard.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('pages.dashboard.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validatedData = $request->validated();
        $filename = $book->image;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            $oldImage = public_path('assets/images/books/' . $book->image);
            if ($book->image && file_exists($oldImage)) {
                @unlink($oldImage);
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $title = str_replace(' ', '_', $request->title);
            $filename = $title . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/books/'), $filename);
        }

        // Update buku dengan data baru
        $book->update([
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'publisher' => $validatedData['publisher'],
            'publication_date' => $validatedData['publication_date'],
            'price' => $validatedData['price'],
            'quantity' => $validatedData['quantity'],
            'image' => $filename,
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->image) {
            // Hapus gambar lama jika ada
            $oldImage = public_path('assets/images/books/' . $book->image);
            if (file_exists($oldImage)) {
                @unlink($oldImage);
            }
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
