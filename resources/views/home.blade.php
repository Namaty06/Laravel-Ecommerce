@extends('layouts.app')

@section('content')
<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="mask flex-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-12 order-md-1 order-2">
                            <h4>Namastore</h4>
                            <p>This has many features that are simply awesome. The phone comes with a 3.50-inch display with a resolution of 320x480 pixels.</p> <br> <a href="#">BUY NOW</a>
                        </div>
                        <div class="col-md-5 col-12 order-md-2 order-1"><img src="https://img.freepik.com/vecteurs-libre/magasin-carte-credit-coffrets-cadeaux-illustration-acheteurs_1262-18980.jpg?size=626&ext=jpg" class="mx-auto" alt="slide"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="mask flex-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-12 order-md-1 order-2">
                            <h4>Free Delivery </h4>
                            <p>This has many features that are simply awesome.The phone comes with a 3.50-inch display with a resolution of 320x480 pixels.</p> <br> <a href="#">SHOP NOW</a>
                        </div>
                        <div class="col-md-5 col-12 order-md-2 order-1"><img src="https://img.freepik.com/vecteurs-libre/service-livraison-concept-masques_23-2148497067.jpg?size=626&ext=jpg" class="mx-auto" alt="slide"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
</div>

<div class="container mr-5 mb-2">
    <div class="" style="display: flex" >
       <div class="col-sm-10" >
          <form action="{{route('filter')}}" method="get">
            <div class="input-group">
                
                  <input id="search-input" placeholder="Search Products :" name="search" type="search" id="form1" class="form-control "  />
                  
              
                <button id="search-button" type="button" class="btn btn-primary">
                  <i class="fas fa-search"></i>
                </button>
               
              </div>
             
            </form>
       </div> 
       <div class="btn-group mr-3">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Filter By price
                    </button>
                    <div class="dropdown-menu">
                        
                      <a class="dropdown-item" href="{{route('desc')}}">Price :Low To High</a>
                      <a class="dropdown-item" href="{{route('asc')}}">Price :High To Low</a>
                      
                      
                    </div>
                  </div>
    </div>
  </div>

  <div class="container-fluid mt-1 mb-5">

    <div class="row g-2">
        <div class="col-md-3">      
            <div class="card" style="border-color:rgb(197, 190, 211) ">
                <article class="card-group-item" >
                    <header class="card-header">
                       
                        <h6 class="title"> <i class="fa fa-list-alt ml-2 " style="font-size: 22px ; color:rgb(152, 84, 216)" >  Similar categories</i>  : </h6>
                    </header>
                    <div class="filter-content">
                        <div class="list-group list-group-flush">
                            @foreach ($categories as $category)                            
                           <a href="{{route('products.category',['category'=>$category->id])}}" class="list-group-item">{{$category->title}} <span class="float-right badge badge-light round" style="color:rgb(168, 124, 250)">{{$category->product->count()}}</span>  </a>
                            @endforeach
                    </div>  
                    </div>
                </article>               
            </div> 
           
        </div>
        <div class="col-md-9">
            <div class="row g-2">
                @foreach ($products as $product)

                <div class="col-md-4" >
                    <div class="product py-4" style="" > 
                        <div class="col-md-6 mb-2 shadow-sm"> 
                            <div class="card" style="border-radius: 15px ; width: 19rem ; border-color:rgb(206, 206, 206) ">
                             <div class="card-img-top " style=""  >
                                <img class="img-fluid  " style=" border-radius: 15px 15px 0px 0px" src="{{ asset('images/'.$product->image)}}" alt="">
                             </div>
                             <div class="card-body">
                                 <h5 class="card-title">{{$product->title}}</h5>
                                 <p class="s-flex flex-row justify-content-between align-items">
                                     <span class="text-primary">
                                         {{$product->price}} DH
                                     </span>
                                 </p>
                                 <p class="card-text">
                                     {{Str::limit($product->description,80)}}
                                 </p>
                                 <a href="{{route('products.show',['product'=>$product->id])}}" class="btn btn-outline-primary">Show <i class="fas fa-eye"></i></a>
                             </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                
            </div>
            {{ $products->links('pagination::bootstrap-4') }} 

        </div>
    </div>
</div>

@endsection
