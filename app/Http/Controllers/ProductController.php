<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $products = Product::latest()->get(); 

        return view('admin.products.index',[
            'products'=>$products        
        ]);
    }
 

    public function dashboard()
    {
        
        $products = Product::with(['category'])->where('stock','=','0')->get(); 
        $date = Carbon::now()->toDateTimeString();
        $orders = Order::with(['product','user'])->whereDate('created_at',  Carbon::now())->where('status_id','!=',2)->get();
        $total = Order::where('status_id','=',2)->sum('Total');
        $sales = Order::where('status_id','!=',4)->where('status_id','!=',3)->count();
        $refund = Order::where('status_id','=',4)->count();
        $users = User::all()->count();
        $statuses = Status::all();
        

        return view('admin.Dashboard',[
            'products'=>$products  ,
            'orders'=>$orders,
            'statuses'=>$statuses ,
             'total'=>$total,
             'sales'=>$sales,
             'refund'=>$refund,
             'users'=>$users


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::select("*")->orderBy("title",'asc')->get();
        return view('admin.products.store' ,[
            'categories'=>$Categories
        ]);
    }

    public function search(Request $request)
    { 
      $search = $request->input('search');
      $products = Product::where('title','LIKE','%'.$search.'%')->get();
      
       return  view('admin.products.index',[
           'products'=>$products
       ]) ;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
      
      $name = $request->file('image')->getClientOriginalName();    
      $request->image->move(public_path('images'),$name);
       Product::create([
           'title'=>$request->input('title'),
           'description'=>$request->input('description'),
           'price'=>$request->input('price'),
           'stock'=>$request->input('stock'),
           'category_id'=>$request->category,         
            'image'=>$name

       ]);
       return  redirect()->route('admin.products.index') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {      
       $product = Product::findOrFail($product->id);
       $feedbacks= Feedback::where('product_id',$product->id)->with('user')->get();
      
       return view('product.show',[
        'product'=>$product ,
        'feedbacks'=>$feedbacks
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       $product = Product::findOrFail($product->id);
      $categories= Category::all();
      
        return view('admin.products.update',[
            'product'=>$product,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
       
        $product = Product::findOrFail($product->id);

        $name = $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'),$name);

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->category_id = $request->category;
        $product->image = $name;
        $product->update();
        return redirect()->route('admin.products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = Product::findOrFail($product->id);
        $product->delete();
        return redirect()->route('admin.products.index');
    }
   
  
}
