<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Book;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index()
    {
        $carts = Sale::where('user_id', auth()->id())->where('status', 'pending')->get();
        return view('pages.carts.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
            'user_id' => 'required'
        ]);

        $book = Book::find($request->book_id);
        $quantity = 1;

        // Check if the sale already exists
        $sale = Sale::where([
            ['user_id', '=', $request->user_id],
            ['book_id', '=', $request->book_id],
            ['status', '=', 'pending']
        ])->first();

        if ($sale) {
            // Update existing sale
            $sale->quantity += $quantity;
            $sale->total += $book->price * $quantity;
            $sale->save();
        } else {
            // Create new sale
            Sale::create([
                'user_id' => $request->user_id,
                'book_id' => $request->book_id,
                'status' => 'pending',
                'quantity' => $quantity,
                'total' => $book->price * $quantity
            ]);
        }

        return redirect()->back()->with('success', 'Book added to cart successfully!');
    }

    public function destroy($id)
    {
        $cart = Sale::find($id);
        if ($cart) {
            $cart->delete();
            return response()->json(['success' => true, 'message' => 'Item removed from cart successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Item not found in cart.'], 404);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $cart = Sale::find($id);
        if (!$cart) {
            return response()->json(['message' => 'Cart item not found.'], 404);
        }

        // Check if Book item exists
        $book = Book::find($cart->book_id);
        if (!$book) {
            return response()->json(['message' => 'Book not found.'], 404);
        }

        // Update quantity and total
        $cart->quantity = $request->quantity;
        $cart->total = $cart->quantity * $book->price;

        // Save changes
        $cart->save();

        return response()->json(['message' => 'Quantity updated successfully.']);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'cartItems' => 'required|array',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);
    }
}
