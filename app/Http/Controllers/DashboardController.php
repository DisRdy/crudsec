<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik
        $totalProducts = Product::count();
        $totalQuantity = Product::sum('qty');
        $totalValue = Product::selectRaw('SUM(harga * qty) as total')->value('total') ?? 0;
        $averagePrice = Product::avg('harga') ?? 0;

        // Produk terbaru (10 terakhir)
        $recentProducts = Product::latest()->take(10)->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalQuantity',
            'totalValue',
            'averagePrice',
            'recentProducts'
        ));
    }
}