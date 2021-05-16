@extends('admin.master')
@section('main')
    
  <h1 class="h2 mb-3">Dashboard</h1>
     
    
    <div class="row mb-5">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats" style="background-color: #adc2d8">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
               <h4>Sales</h4> 
              
            </div>
            <p class="card-category">Used Space</p>
            <h3 class="card-title">{{$sales }}
              <small>Orders</small>
            </h3>
          </div>
          
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6"  >
        <div class="card card-stats" style="background-color: #93bb7c">
          <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                 <h4>Total Benefits</h4> 
                
              </div>
              <p class="card-category">Used Space</p>
              <h3 class="card-title"> 
                <small>{{$total }},00 DH</small>
              </h3>
            </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6" >
        <div class="card card-stats" style="background-color: #ce7d5d">
          <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                 <h4>Refund</h4> 
                
              </div>
              <p class="card-category">Used Space</p>
              <h3 class="card-title">{{$refund}}
                <small>Orders </small>
              </h3>
            </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6"  >
        <div class="card card-stats" style="background-color: #888888">
          <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                 <h4>Users</h4> 
                
              </div>
              <p class="card-category">Used Space</p>
              <h3 class="card-title">
                <small>+{{$users}} </small>
              </h3>
            </div>
        </div>
      </div>
    </div>
    <!-- 
    
    -->     
  
    <div class="row">
      <div class="col-md-12 card p-3">
    <h2>Today Orders </h2>
    <div class="table-responsive " style="border-radius: 10px; ">  
      @foreach ($orders as $order)     
      <table style="background-color: #dfdede" border-radius: 20px; border:2px solid rgb(209, 209, 209);" class="table  table-striped">
       
         <thead> 
         
          <tr>
            <th>Order id</th>
            <th>User</th>
            <th>Country</th>
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
          <td> {{$order->Total}} DH</td>
          <td>
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
        </td> 
          <td> {{$order->created_at->format('jS F Y ') }}</td>
          <td>
            <a class="btn btn-sm btn-info" href="{{route('admin.showOrder',['id'=>$order->id])}}"> <i class="fas fa-eye"> Show</i></a>
    
        </td> 
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
  
    <div class="row">
      <div class="col-md-12 card p-3">
    <h2>Out Of Stock</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Product</th>
            <th>title</th>
            <th>description</th>
            <th>price</th>
            <th>stock</th>
            <th>category</th>
            <th>Edit</th>
           
            
          </tr>
        </thead>
         <br>
        <tbody>
         
            @foreach ($products as $product)
          <tr>
            <td style="width: 135px;"> <img style="width: 110px" class="rounded mx-auto d-block " src="{{ asset('images/'.$product->image)}}" alt=""> </td>
            <td>{{Str::limit($product->title,25)}}</td>
            <td>{{Str::limit($product->description,25)}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->category->title}}</td>

            <td style="width: 50px">
            <a class="btn btn-sm btn-success" href="{{route('admin.products.edit',['product'=>$product])}}">  <i class="fa fa-edit"></i> </a>
            </td>
            
          </tr>    
          @endforeach    
        </tbody>
      </table>
    </div>
      </div></div>
   
   @endsection