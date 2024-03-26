<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use App\Models\Seller;
use App\Traits\UploadImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SellerController extends Controller
{
    use UploadImage;
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
    public function addBusinessInformation(){
        return view('seller.addBusinessInformation');
    }

    public function sendContactMessage(ContactUsRequest $contactUsRequest){
        ContactUs::create([
            'seller_id'=>Auth::guard('seller')->user()->id,
            'seller_name'=>$contactUsRequest->name,
            'seller_email'=>$contactUsRequest->email,
            'subject'=>$contactUsRequest->subject,
            'message'=>$contactUsRequest->message,
        ]);
        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function viewOrderPage(){
        return view('seller.order');
    }
    public function addNewProduct(){
        $categories = Category::all();
        return view('seller.addNewProduct',compact('categories'));
    }
    public function storeNewProduct(StoreProductRequest $storeProductRequest){
      $product= Product::create([
            'seller_id'=>Auth::guard('seller')->user()->id,
            'category_id'=>$storeProductRequest->category_id,
            'title'=>$storeProductRequest->title,
            'subtitle'=>$storeProductRequest->subtitle,
            'description'=>$storeProductRequest->description,
            'quantity'=>$storeProductRequest->quantity,
            'price'=>$storeProductRequest->price,
            'offer'=>$storeProductRequest->offer,
        ]);
        ProductVariation::create([
            'product_id'=> $product->id ,
            'color'=>$storeProductRequest->color,
            'size'=>$storeProductRequest->size,
        ]);
        ProductImage::create([
            'product_id'=> $product->id ,
            'image'=>$this->UploadImage($storeProductRequest,'image','Products')
        ]);
        return redirect()->route('seller.addNewProduct')->with('success','Product Created Successfully');
    }
    public function viewProductListPage(){
        return view('seller.products-List');
    }

    public function editBusinessInformation(Seller $seller){
        return view('seller.admin');
    }
    public function storeEditBusinessInformation(Seller $seller){

    }
    public function viewContactUsPage(){
        return view('seller.contact-us');
    }
    public function viewEditProduct(Product $product):View{
        return  view('seller.editProduct',compact('product'));
    }
    public function save_edited_product(EditProductRequest $request, Product $product):RedirectResponse{
        $validated = $request->validated();

        if ($validated['title'] !== $product->title) {
            $product->title = $validated['title'];
        }

        if ($validated['subtitle'] !== $product->subtitle) {
            $product->subtitle = $validated['subtitle'];
        }

        if ($validated['description'] !== $product->description) {
            $product->description = $validated['description'];
        }

        if ($validated['quantity'] !== $product->quantity) {
            $product->quantity = $validated['quantity'];
        }

        if ($validated['price'] !== $product->price) {
            $product->price = $validated['price'];
        }

        if ($validated['offer'] !== $product->offer) {
            $product->offer = $validated['offer'];
        }

        if ($validated['color'] !== $product->variation->color) {
            $product->variation->update(['color' => $validated['color']]);
        }

        if ($validated['size'] !== $product->variation->size) {
            $product->variation->update(['size' => $validated['size']]);
        }

        if ($validated['category'] !== $product->category->name) {
            $product->category->update(['name' => $validated['category']]);
        }

        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid('image_') . '.' . $image->getClientOriginalExtension();

                $image->storeAs('images', $filename);

                $uploadedImages[] = ['image' => $filename];
            }
        }
        $product->images()->createMany($uploadedImages);

        $product->save();

        return redirect()->route('seller.productListPage');
    }
    public function deleteProduct(Product $product)
    {
        $product->delete();
//        $products = Product::with('seller', 'category')->paginate(10);
        return redirect()->route('seller.productListPage',);
    }
    public function search(Request $request): view
    {
        $search= $request->input('search');

        $sellers = Seller::where('name', 'like', "%$search%")
            ->paginate(10);

        return view('admin.sellers', compact('sellers'));
    }
}
