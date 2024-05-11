<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function addProductToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $user = Auth::user();
        $product = Product::findOrFail($productId);

        // Get the user's cart
        $cart = $user->cart;

        // If the user doesn't have a cart, create a new one
        if (!$cart) {
            $cart = $user->cart()->create([
                'user_id'=>$user->id,
                'product_id'=>$productId
            ]);
        }

        // Attach the product to the user's cart
        $cart->products()->attach($product);

        // Calculate subtotal and total prices


        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    public function home()
    {
        $topSalesProduct = Product::with('images')
            ->orderByDesc('sales_count')
            ->limit(4)
            ->get(['id','title', 'subtitle', 'price', 'status']);
        $topPriceOfProduct = Product::with('images')
            ->orderByDesc('price')
            ->limit(4)
            ->get(['id','title', 'subtitle', 'price', 'status']);
        $newArrivals = Product::with('images')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        return view('user.home', [
            'topSalesProduct' => $topSalesProduct,
            'newArrivals' => $newArrivals,
            'topPriceOfProduct'=>$topPriceOfProduct
        ]);
    }


    public function shop(){
        $products = Product::with('images')->limit(16)->get();
        return view('user.shop',compact('products'));
    }
    public function editorial(){
        $products = Product::with('images')
            ->select('id', 'title', 'description')
            ->take(3)
            ->get();
        return view('user.editorial',compact('products'));
    }
    public function aboutUs(){
        return view('user.aboutUs');
    }
    public function Cart()
    {
        $user = Auth::user();
        $cart = $user->cart;
        $cartItems = $cart->products;
        $subtotal = $cart->products->sum('price');
        $total = $subtotal;
        return view('user.cart', compact('cartItems','subtotal','total'));
    }
    public function remove($id)
    {
        $user = Auth::user();
        $cart = $user->cart;
        $cart->products()->detach($id);

        return redirect()->route('user.cart')->with('success', 'Product removed from cart.');
    }
    public function get_by_status($status): view
    {
        $orders = Order::with('user')
            ->where('user_id','=',Auth::guard('web')->user()->id)
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.orders', get_defined_vars());
    }

    public function order_update(Order $order, $status): view
    {
        $order->update([
            'status' => $status,
        ]);

        $orders = Order::with('user')
            ->where('user_id','=',Auth::guard('web')->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.orders', get_defined_vars());
    }
    public function order(){
        $orders = Order::with('user')->where('user_id','=',Auth::guard('web')->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('user.orders',compact('orders'));
    }
}
