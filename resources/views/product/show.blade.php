@extends('layouts.app')

@section('content')
<div class="container mb-5" >
    <div class="row ">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">
                    <h2>{{$product->title}}</h2>
                </div>
                    <div class="card-img-top w-80">
                        <img class="img-fluid " src="{{ asset('images/'.$product->image)}}" alt="">
                    </div>
                     <div class="card-body">
                         <h5 class="card-title"></h5>
                         <p class="text-dark font-weight-bold">
                             {{$product->category->title}}
                         </p>
                         <p class="text-info s-flex flex-row justify-content-between align-items" style="font-weight: bold">   
                                 {{$product->price}} DH               
                         </p>
                         <p class="card-text">
                             {{$product->description }}
                         </p>
                         <p class="font-weight-bold">
                             @if ($product->stock > 0)
                             <span class="text-success"> InStock({{$product->stock}})</span>
                    
                             @else
                               <span class="text-danger">Out Of Stock</span>  
                             @endif
                         </p>
                </div>
            </div> 
        </div>  
        <div class="col-md-4 mt-5">

            <form action="{{route('cart.add',['product'=>$product->id])}}" method="post">
              @csrf
              <div class="form-group mt-5">
                <label for="qtt" class="label-input"> Quantity :</label>
                 <input class="form-control" placeholder="Quantity " value="1" type="number" name="quantity" max="{{$product->stock}}" min="1">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-block bg-dark text-white " data-toggle="modal" data-target="#exampleModal">
                      <i class="fa fa-shopping-cart"></i>
                      Ajouter Au Panier
                  </button>
                     
              </div>
            </form>     
         </div>  
    </div>
    
</div>
<div class="row d-flex justify-content-center mt-10 mb-5">
  <div class="col-lg-8">
      <div class="card mb-4 pb-3 mr-4">
          <div class="card-body text-center">
              <h4 class="card-title">FeedBacks</h4>
          </div>
          <div class="comment-widgets mr-5 ml-5 mb-4">
            <div class="d-flex flex-row comment-row m-t-0">
              <div class="comment-text w-100">
                <form action="{{route('Feedback.store')}}" method="post">
                  @csrf
                 <label for="">Comment :</label>
                 <textarea class="form-control" name="comment" id="" cols="30" rows="2"></textarea>
                 
                 <button class="btn btn-primary mt-2">comment</button>
                 <input type="hidden" value="{{$product->id}}" name="id">
                </form>
              </div>
          </div>
     @foreach ($feedbacks as $feedback )
       
    
              <div class="d-flex flex-row comment-row mt-5 mb-4">
                  <div class="comment-text w-100">
                   
                    <h6 style="color: rgb(122, 2, 241); font-weight:bold" class="font-medium">{{$feedback->user->name}}</h6> <span class="m-b-15 d-block">{{$feedback->comment}}</span>
                   
                    <div class="comment-footer">
                         <span class="text-muted float-right">{{$feedback->updated_at}}</span>
                        
                         @can('delete', $feedback)
                         <form action="{{route('Feedback.destroy',['Feedback'=>$feedback->id])}}" method="post">
                          @csrf
                          @method('Delete')
                         <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button> 
                        
                        </form>
                        @endcan
                      </div>
                  </div>
              </div>
              @endforeach
          </div> <!-- Card --> 
      </div>
  </div>
</div>
@endsection
