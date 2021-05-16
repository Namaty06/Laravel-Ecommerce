<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::latest()->where('stock','>',0)->paginate(12); 
        $categories = Category::has('product')->paginate(10); 
       
        return view('home',[
            'products'=>$products,
            'categories'=>$categories,
             

        ]);
    }
    public function ProductbyCategory(Category $category)
    {
        
        $products = $category->product()->paginate(12);
        $categories = Category::has('product')->paginate(10); 

        return view('home',[
            'products'=>$products,
            'categories'=>$categories
        ]);
    }
    public function filter(Request $request)
    {
        $categories = Category::has('product')->paginate(10); 
        $search = $request->input('search');
        $products = Product::where('title','LIKE','%'.$search.'%')->paginate(12);
      
        return view('home',[
            'products'=>$products,
            'categories'=>$categories
        ]);

    }
    public function asc()
    {
        $products = Product::select("*")->orderByDesc("price")->paginate(12);
        $categories = Category::has('product')->paginate(10); 
  
        return view('home',[
            'products'=>$products,
            'categories'=>$categories
        ]);

    }

    public function desc()
    {
        $products = Product::select("*")->orderBy("price" , 'Asc')->paginate(12);
        $categories = Category::has('product')->paginate(10); 

        return view('home',[
            'products'=>$products,
            'categories'=>$categories
        ]);

    }
}
