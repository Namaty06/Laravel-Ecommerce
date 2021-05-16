@extends('admin.master')

@section('main')

<h2>My Products</h2>
<div class="col-sm-10 mt-3 " >
  <form action="{{route('admin.searchprod')}}" method="get">

    <div class="input-group mb-3">
      
      <input id="search-input" placeholder="Search Products :" name="search" type="search" id="form1" class="form-control "  />
    <button id="search-button" type="submit" class="btn btn-primary">
      <i class="fas fa-search"></i>
    </button>
     
    </form>
</div> 
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Product</th>
            <th>title</th>
            <th>description</th>
            <th>price</th>
            <th>stock</th>
            <th>Last Update</th>
            <th>Edit</th>
            <th>Delete</th>
            
          </tr>
        </thead>
         <br>
        <tbody>
         
            @foreach ($products as $product)
          <tr>
            <td style="width: 135px;height:120px"> <img style="width: 110px; " class="rounded mx-auto d-block img-thumbnail " src="{{ asset('images/'.$product->image)}}" alt=""> </td>
            <td>{{Str::limit($product->title,25)}}</td>
            <td>{{Str::limit($product->description,25)}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->updated_at}}</td>

            <td style="width: 50px">
            <a class="btn btn-sm btn-info" href="{{route('admin.products.edit',['product'=>$product])}}"> <i class="fa fa-edit"></i> </a>
            </td>
            <td>
              <form action="{{route('admin.products.destroy',['product'=>$product])}}" method="POST">
            @csrf
            @method('Delete')
               
                <button type="submit"   class="btn btn-sm btn-danger">
                    <i style="font-size:16px" class="fa fa-trash"></i>
                </button>
           
           </form>
              </td>
          </tr>    
          @endforeach    
        </tbody>
      </table>
    </div>

@endsection