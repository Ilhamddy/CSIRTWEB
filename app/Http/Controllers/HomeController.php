<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::count();
        $categories = Category::count();
        $products = Product::count();
        $orders = Order::count();

        $total_pendapatan = Order::selectRaw('CAST(SUM(total_cost) AS DECIMAL(10,2)) AS total_pendapatan')->groupByRaw('Month(created_at)')->where('status', 'paid')->pluck('total_pendapatan');
        $bulan = Order::selectRaw('MONTHNAME(created_at) as bulan')->groupByRaw('MONTHNAME(created_at)')->pluck('bulan');
        $total_cost = $total_pendapatan;
        // dd($total_cost);

        return view('pages.dashboard', compact('users', 'categories', 'products', 'orders', 'total_cost', 'bulan'));
    }
}
