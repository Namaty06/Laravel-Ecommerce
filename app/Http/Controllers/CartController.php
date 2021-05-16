<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $items = \Cart::getContent(); 
        return view('cart.index' ,[
            'items' => $items
        ]);
       
    }
    public function addToCart(Request $request, Product $product){
        \Cart::add(
            array(
                'id'=>$product->id,
                'name'=>$product->title,
                'price'=>$product->price,
                'quantity'=>$request->quantity,
                'attributes'=>array(),
                'associatedModel'=>$product,
                'image'=>$product->image

            )
            );
            return redirect()->route('home');
    }
    public function UpdateCart(Request $request, Product $product){
        \Cart::update($product->id,
            array(
                'quantity'=>array(
                    'relative'=>false,
                    'value'=>$request->quantity
                      )
            ));
            return redirect()->route('cart.index');
    }
    public function DeleteCart( Product $product){
        \Cart::remove($product->id);
            return redirect()->route('cart.index');
    }
}
