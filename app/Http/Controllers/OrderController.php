<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;


class OrderController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
       
        $orders = Order::with(['product','user','status'])->latest()->get();
      
        return view('admin.orders.index',[
          'orders'=>$orders,
          'statuses'=>$statuses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $r = 1;
        $items = \Cart::getContent(); 
     //  dd($items);
     if(\Cart::getTotalQuantity()>0){

     
       $total =\Cart::getSubTotal();
       $order = Order::create([
           'Total' => $total,
           'user_id'=> auth()->user()->id,
            'status_id'=>$r   
            ]);
        foreach ($items as  $item) {
        $p = Product::findOrFail($item->id);
        if($p->stock > $item->quantity){
         $order->product()->attach($item->id ,['quantity'=>$item->quantity , 'price'=>$item->price] );
        }
        $p->stock =$p->stock -$item->quantity;
        $p->update();
        }
         \Cart::clear();
        
        return view('Orders.confirm');
     }
     else{
         
     }
     return redirect()->route('home');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id','=', $id)->with(['product' , 'user'])->latest()->get();
        return view('Orders.show', [
          'orders'=>$orders  
      ]);
    }
    public function showOrder($id)
    {
        $order = Order::where('id','=', $id)->with('user','product','status')->first(); 
        $statuses = Status::all();
        return view('admin.orders.show', [
          'order'=>$order  ,
          'statuses'=>$statuses
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function cancel($id )
    {
        $order = Order::findOrFail($id);
        $order->status_id = 3;
        $order->update();
        return redirect()->back();
    }

    public function invoice($id)
    {
        $order = Order::where('id','=', $id)->with('user','product','status')->first(); 
        $customer = new Buyer([
            'name'          => $order->user->name,
            'custom_fields' => [
                'email' => $order->user->email,
                'country'=>$order->user->country,
                'city'=>$order->user->city,
                'adress'=>$order->user->adress,
                'zip'=>$order->user->zip,
            ],
        ]);
        
    foreach ($order->product as $product) {

        $item = (new InvoiceItem())
        
        ->title($product->title)
        ->pricePerUnit($product->pivot->price)
        ->quantity($product->pivot->quantity);

    }
    
        $invoice = Invoice::make()
            ->buyer($customer)            
            ->shipping(0)
            ->addItem($item)
            ->currencySymbol('DH')
            ->currencyCode('DH');


        return $invoice->stream();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $order = Order::findOrFail($id);
        if($request->id == 1){
        $order->status_id = $request->status;
        $order->update();
    }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$order = Order::findOrFail($id);
        $order->delete();

       return redirect('/home');*/
    }
}
//matnsach tafficher les produit d order
