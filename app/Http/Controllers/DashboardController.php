<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Book;
use App\Models\Sale;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(): View
    {
        if (Auth::user()->role == 'admin') {
            $recentSales = Sale::with(['user', 'book'])->where('status', 'completed')->orderBy('created_at', 'desc')->take(5)->get();
            $totalUsers = User::count();
            $totalBooks = Book::count();
            $totalSales = Sale::where('status', 'completed')->count();
            $totalRevenue = Sale::where('status', 'completed')->sum('total');

            $categorySales = DB::table('sales')
                ->join('books', 'sales.book_id', '=', 'books.id')
                ->join('categories', 'books.category_id', '=', 'categories.id')
                ->select('categories.name', DB::raw('count(sales.id) as total_sales'))
                ->where('sales.status', 'completed')
                ->groupBy('categories.name')
                ->pluck('total_sales', 'categories.name')
                ->all();

            $categories = Category::all();
            $bookCounts = [];
            foreach ($categories as $category) {
                $bookCounts[$category->name] = $category->books()->count();
            }
            $pendingSalesCount = Sale::where('status', 'pending')->count();
            $completedSalesCount = Sale::where('status', 'completed')->count();
            $monthlySales = Sale::select(
                DB::raw('SUM(total) as total_sales'),
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month')
            )
                ->where('created_at', '>=', Carbon::now()->subYear())
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get()
                ->pluck('total_sales', 'month')
                ->toArray();

            // Top users by spending
            $topUsers = User::select('username', DB::raw('SUM(sales.total) as total_spent'))
                ->join('sales', 'users.id', '=', 'sales.user_id')
                ->where('sales.status', 'completed')
                ->groupBy('users.id', 'users.username')
                ->orderBy('total_spent', 'desc')
                ->take(5)
                ->get();

            return view('pages.dashboard.index', compact(
                'totalUsers',
                'totalBooks',
                'totalSales',
                'totalRevenue',
                'recentSales',
                'categorySales',
                'bookCounts',
                'pendingSalesCount',
                'completedSalesCount',
                'monthlySales',
                'topUsers'
            ));
        } else {
            $books = Book::all();
            return view('welcome', compact('books'));
        }
    }
}
