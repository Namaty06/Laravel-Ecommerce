@extends('layouts.app')
@section('content')

 <div class="container " style="margin-top:70px;">
       <div class="row">
            <div class="col-md-12 card p-3 ">
                <h3 class="text-dark">Your Shopping Cart</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Unity Price</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                                                   
                        <tr>                          
                            <td>
                                <img class="img-fluid rounded" src="{{ asset('images/'.$item->associatedModel->image)}}" alt="{{$item->name}}" 
                                width="60" height="60">
                            </td>
                            <td>{{$item->name}}</td>
                            <td> 
                                <form action="{{route('cart.update',['product'=>$item->id])}}" method="POST"
                                    class="d-flex flex-row justify-content-center align-items-center">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                  <label for="qtt" class="label-input"> Quantity :</label>
                                   <input class="form-control" placeholder="Quantity " value="{{$item->quantity}}" type="number" name="quantity" max="{{$item->associatedModel->stock}}" min="1">
                                </div>
                                
                                    <button type="submit" class="btn mt-3 ml-1 btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </button>
                               
                               </form>     </td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->price * $item->quantity}} DH</td>
                             <td> 
                                 <form action="{{route('cart.delete',['product'=>$item->id])}}" method="POST"
                                class="d-flex flex-row justify-content-center align-items-center">
                            @csrf
                            @method('Delete')
                               
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                           
                           </form>
                        </td>
                        </tr>
                         @endforeach
                         <tr class="text-dark font-weight-bold">
                             <td colspan="3" class="border border-primary">
                                 Total :
                             </td>
                             <td colspan="3" class="border border-primary">
                                 {{\Cart::getSubTotal()}} DH
                            </td>
                         </tr>
                    </tbody>
                </table>           
        </div>   
        
        <form style="margin-bottom: 250px; margin-top:30px;" action="{{route('confirm.order')}}" method="POST">
         @csrf
            <button type="submit" class="btn btn-primary"> Order Now !</button>

      </form>
 </div>    
 


@endsection