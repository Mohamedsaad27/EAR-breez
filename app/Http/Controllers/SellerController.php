<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SellerController extends Controller
{
    public function viewDashboard(){

        return view('seller.dashboard',[
            'products' =>Product::all(),
            'orders'=>Order::all(),
            'deliveredOrders'=>Order::where('status','=','shipped')->get(),
            'returnedOrders'=>Order::where('status','=','cancelled')->get(),
            'pendingOrders'=>Order::where('status','=','in production')->get(),
            'averageOrderValue'=>Order::average('total_value'),
            'totalSales'=>Order::sum('total_value'),
            'topSalesProduct'=>Product::select('title','price','quantity','status')
                                ->orderByDesc('sales_count')
                                ->limit(5)
                                ->get()
        ]);
    }
    public function index(): view
    {
        $sellers = Seller::paginate(10);
        return view('admin.sellers', compact('sellers'));
    }

    public function viewOrderPage(){
        return view('seller.order');
    }

    public function viewProductListPage(){
        return view('seller.products-List');
    }

    public function editBusinessInformation(){
        return view('seller.admin');
    }

    public function viewContactUsPage(){
        return view('seller.contact-us');
    }

    public function search(Request $request): view
    {
        $search= $request->input('search');

        $sellers = Seller::where('name', 'like', "%$search%")
            ->paginate(10);

        return view('admin.sellers', compact('sellers'));
    }
}
