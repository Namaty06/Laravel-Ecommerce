@extends('admin.master')

@section('main')


<h1 class="h2 mt-3 mb-3">Dashboard</h1>
<form action="{{route('admin.products.update',['product'=>$product,'categories'=>$categories])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
     @csrf
      <div class="col-md-4 mb-3">
        <label for="validationCustom01"> Title :</label>
        <input type="text" class="form-control row" id="validationCustom01" placeholder="Title" value="{{$product->title}}"  name="title" required>
      </div>
       
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description :</label>
        <textarea class="form-control"  id="exampleFormControlTextarea1" rows="3" name="description" >{{$product->description}}</textarea>
      </div>
  

   
    <div class="col-md-6 mb-3">
        <label for="validationCustomUsername">Stock :</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
          </div>
          <input type="text" class="form-control" value="{{$product->stock}}" name="stock" id="validationCustomUsername" placeholder="Stock" aria-describedby="inputGroupPrepend" required>
        </div>
      </div>
   
    <div class="form-row">
      <div class="col-md-6 mb-3">
          
        <label for="validationCustom03">Price</label>
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">DH</span>
            </div>
        <input type="text" class="form-control" id="validationCustom03" value="{{$product->price}}" name="price" placeholder="Price" required>        
      </div>
      </div>
    
    <div class="form-row">
        <div class="col-md-6 mb-3">
    <label for="Categories">Categories</label>
    <select name="category" class="form-control" id=""> 
      <option selected value="{{$product->category_id}}">{{$product->category->title}}</option>    
        @foreach ($categories as $item)  
         
    <option value="{{$item->id}}"> {{$item->title}} </option>
    @endforeach
    </select>  
        </div>
    </div>
   
    <div class="col-md-6 mb-3">
        <label for="validationCustom03">Image :</label>
        <input type="file" name="image" class="form-control" value="{{ asset('images/'.$product->image)}}" id="validationCustom03"  required>        
      </div>
    <button class="btn btn-primary" type="submit">Update Product</button>
  </form>
   
    
@endsection
