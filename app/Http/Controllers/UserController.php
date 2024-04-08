<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $topSalesProduct = Product::with('images')
            ->orderByDesc('sales_count')
            ->limit(4)
            ->get(['title', 'subtitle', 'price', 'status']);

        $newArrivals = Product::with('images')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get(['title', 'subtitle', 'price', 'status']);

        return view('user.home', [
            'topSalesProduct' => $topSalesProduct,
            'NewArrivals' => $newArrivals,
        ]);
    }


    public function shop(){
        return view('user.shop');
    }
    public function editorial(){
        return view('user.editorial');
    }
    public function aboutUs(){
        return view('user.aboutUs');
    }

    public function order(){
        return view('user.orders');
    }
}
