@extends('admin.master')

@section('main')
<div class="row">
    <div class="col-md-12 card p-3">
  <h2>Today Orders </h2>
  <div class="table-responsive " style="border-radius: 20px; ">  
    @foreach ($orders as $order)     
    <table style="background-color: #e6e6e6" border-radius: 20px; border:2px solid rgb(209, 209, 209);" class="table  table-striped">
     
       <thead> 
       
        <tr>
          <th>Order id</th>
          <th>User</th>
          <th>Country</th>
          <th>Adress</th>
          <th>Total</th>
          <th>Status</th>
          <th>Order Date</th>
        </tr>
      </thead>
  <tbody>
  
                   
    <tr>                                                      
        <td>{{$order->id}}</td>
        <td> {{$order->user->name}}</td>
        <td> {{$order->user->country}}</td>
        <td> {{$order->user->adress}}</td>
        <td> {{$order->Total}}DH</td>  <td>   
        @if ($order->status->id == 1)
          
      <form action="{{route('admin.orders.update',['id'=>$order->id])}}" method="post">                 
               @csrf
               @method('PUT')         
               <select class="badge bg-primary " style="font-size: 16px" name="status" id="">
                 <option selected value="{{$order->status->id}}">{{$order->status->status}}</option>
                 @foreach ($statuses as $status )
                 @if ($order->status->id != $status->id)
                   <option value="{{$status->id}}">{{$status->status}}</option>
                 @endif
                   
                 @endforeach
                 
               </select>
             <button type="submit" class="btn btn-sm btn-success "><i class="fa fa-edit"></i> </button>
        </form>
        
        @else
        <span class="badge bg-primary ">{{ $order->status->status }}</span>
        @endif
          
        <td> {{$order->created_at->format('jS F Y ') }}</td>
        <td>
          <a class="btn btn-sm btn-info" href="{{route('admin.showOrder',['id'=>$order->id])}}"> <i class="fas fa-eye"></i></a>
        </td>
    </tr>

    <tr>
      <th>Product</th>
      <th>Title</th>
      <th>Quantity</th>
      <th>Price</th>
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