<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\BankTransfers;
use App\Models\BusinessContactInformation;
use App\Models\BusinessInformation;
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
            'products' =>Product::where('seller_id','=',Auth::guard('seller')->user()->id)->get(),
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
    public function storeBusinessInformation(Request $request)
    {
        $sellerId = Auth::guard('seller')->user()->id;
        $fileName = null;

        $request->validate([
            'business_name' => 'required|string',
            'business_address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:business_contact_information,phone',
            'phone' => 'required|string|unique:business_contact_information,phone',
            'website' => 'nullable|string|url|unique:business_contact_information,website',
            'address' => 'required|string',
            'certificate_information' => 'nullable|file|mimes:doc,docx,pdf',
            'comment' => 'nullable|string',
        ]);

        if ($request->hasFile('certificate_information')) {
            $file = $request->file('certificate_information');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/certificates'), $fileName);
        }

        BusinessInformation::create([
            'business_name' => $request->business_name,
            'business_address' => $request->business_address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'certificate_information' => $fileName, // Assign $fileName here
            'comment' => $request->comment,
            'seller_id' => $sellerId
        ]);

        BusinessContactInformation::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'address' => $request->address,
            'seller_id' => $sellerId
        ]);
        return redirect()->route('seller.Dashboard')->with('success', 'Business information stored successfully.')->with('message_duration', 5000);

    }

    public function editBusinessInformation(Seller $seller){
        $businessInformationBySellerId = BusinessInformation::where('seller_id','=',$seller->id)->first();
        $businessContactInformationBySellerId = BusinessContactInformation::where('seller_id','=',$seller->id)->first();
        $bankTransefersBySellerId = BankTransfers::where('seller_id','=',$seller->id)->first();
        return view('seller.admin',compact('seller',
            'businessInformationBySellerId',
        'businessContactInformationBySellerId',
        'bankTransefersBySellerId'));
    }
    public function storeEditBusinessInformation(Request  $request, $sellerId)
    {
        $validatedData = $request->validate([
            'business_name' => 'required|string',
            'business_address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'website' => 'nullable|string',
            'address' => 'required|string',
        ]);
        $businessInformation = BusinessInformation::where('seller_id', $sellerId)->firstOrFail();
        $businessInformation->update([
            'business_name' => $validatedData['business_name'],
            'business_address' => $validatedData['business_address'],
            'city' => $validatedData['city'],
            'postal_code' => $validatedData['zip_code'],
        ]);

        // Update Business Contact Information
        $businessContactInformation = BusinessContactInformation::where('seller_id', $sellerId)->firstOrFail();
        $businessContactInformation->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'website' => $validatedData['website'],
            'address' => $validatedData['address'],
        ]);

        // Redirect or return response
        return redirect()->back()->with('success', 'Business information updated successfully.');
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
