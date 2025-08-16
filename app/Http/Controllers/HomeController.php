<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Images;
use App\Models\Order;
use App\Models\Posts;
use App\Models\Product;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::count();
        // $categories = Category::count();
        $berita = Posts::where('status', 'published')->count();
        $foto = Images::count();
        $video = Video::count();

        // $total_pendapatan = Order::selectRaw('CAST(SUM(total_cost) AS DECIMAL(10,2)) AS total_pendapatan')->groupByRaw('Month(created_at)')->where('status', 'paid')->pluck('total_pendapatan');
        // $bulan = Order::selectRaw('MONTHNAME(created_at) as bulan')->groupByRaw('MONTHNAME(created_at)')->pluck('bulan');
        // $total_cost = $total_pendapatan;
        // dd($total_cost);

        return view('pages.dashboard', compact('users', 'berita', 'foto', 'video'));
    }
}
