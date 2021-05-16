@extends('layouts.app')
@section('content')

 <div class="container">
       <div class="row">
            <div class="col-md-12 card p-3">
                <h3 class="text-dark">My Orders</h3>
                <div class="table-responsive">  
                    @foreach ($orders as $order)     
                    <table class="table table-primary table-striped">
                     
                       <thead> 
                       
                        <tr>
                          <th>Order id</th>
                          <th>User</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th>Order Date</th>
                          <th></th>
                        </tr>
                      </thead>
                  <tbody>
                  
                                   
                    <tr>                                                      
                        <td>{{$order->id}}</td>
                        <td> {{$order->user->name}}</td>
                        <td> {{$order->Total}}</td>
                        <td>
                          <span class="badge bg-primary"> {{$order->status->status}}</span>
                        </td> 
                      
                        <td> {{$order->created_at->format('jS F Y ') }}</td>
                       @if ($order->status->id == 1 ) <td>
                          <form action="{{route('order.cancel',['id'=>$order->id])}}" method="post">                 
                            @csrf
                            @method('PUT')                                 
                          <button type="submit" class="btn btn-sm btn-danger "> Cancel Order</button>
                          </form>
                      
                       </td>  
                      @endif
                      
                    </tr>
              
                    <tr>
                      <th>Product</th>
                      <th>Title</th>
                      <th>Quantity</th>
                      <th>Total</th>
                    </tr>
                 
                      @foreach ($order->product as $item)    
                                            
                        <tr>                     
                          <td style="width: 135px;"> <img style="width: 110px" class="rounded mx-auto d-block " src="{{ asset('images/'.$item->image)}}" alt=""> </td>                               
                            <td> {{Str::limit($item->title,25)}}</td>
                            <td> {{$item->pivot->quantity}}</td>
                            <td> {{$item->pivot->price * $item->pivot->quantity}}  DH</td>
                        </tr>
                        @endforeach
                    </tbody> 
                     @endforeach
                    </table>
                  </div>     
        </div>   
        
   
 </div>    
 



















@endsection