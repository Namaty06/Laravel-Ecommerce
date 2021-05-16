<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <style>#myCarousel .carousel-item .mask {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-attachment: fixed
    }
    
    #myCarousel h4 {
        font-size: 50px;
        margin-bottom: 15px;
        color: rgb(0, 0, 0);
        line-height: 100%;
        letter-spacing: 0.5px;
        font-weight: 600
    }
    
    #myCarousel p {
        font-size: 18px;
        margin-bottom: 15px;
        color: #000000
    }
    
    #myCarousel .carousel-item a {
        background: #9b81d8;
        font-size: 14px;
        color: rgb(0, 0, 0);
        padding: 12px 30px;
        display: inline-block
    }
    
    #myCarousel .carousel-item a:hover {
        background: #a872e7;
        text-decoration: none
    }
    
    #myCarousel .carousel-item h4 {
        -webkit-animation-name: fadeInLeft;
        animation-name: fadeInLeft
    }
    
    #myCarousel .carousel-item p {
        -webkit-animation-name: slideInRight;
        animation-name: slideInRight
    }
    
    #myCarousel .carousel-item a {
        -webkit-animation-name: fadeInUp;
        animation-name: fadeInUp
    }
    
    #myCarousel .carousel-item .mask img {
        -webkit-animation-name: slideInRight;
        animation-name: slideInRight;
        display: block;
        height: auto;
        max-width: 100%
    }
    
    #myCarousel h4,
    #myCarousel p,
    #myCarousel a,
    #myCarousel .carousel-item .mask img {
        -webkit-animation-duration: 1s;
        animation-duration: 1.2s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both
    }
    
    #myCarousel .container {
        max-width: 1430px
    }
    
    #myCarousel .carousel-item {
        height: 100%;
        min-height: 550px
    }
    
    #myCarousel {
        position: relative;
        z-index: 1;
        background: rgb(255, 255, 255);
        background-size: cover
    }
    
    .carousel-control-next,
    .carousel-control-prev {
        height: 40px;
        width: 40px;
        padding: 12px;
        top: 50%;
        bottom: auto;
        transform: translateY(-50%);
        background-color: #9180dd
    }
    
    .carousel-item {
        position: relative;
        display: none;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        width: 100%;
        transition: -webkit-transform .6s ease;
        transition: transform .6s ease;
        transition: transform .6s ease, -webkit-transform .6s ease;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-perspective: 1000px;
        perspective: 1000px
    }
    
    .carousel-fade .carousel-item {
        opacity: 0;
        -webkit-transition-duration: .6s;
        transition-duration: .6s;
        -webkit-transition-property: opacity;
        transition-property: opacity
    }
    
    .carousel-fade .carousel-item-next.carousel-item-left,
    .carousel-fade .carousel-item-prev.carousel-item-right,
    .carousel-fade .carousel-item.active {
        opacity: 1
    }
    
    .carousel-fade .carousel-item-left.active,
    .carousel-fade .carousel-item-right.active {
        opacity: 0
    }
    
    .carousel-fade .carousel-item-left.active,
    .carousel-fade .carousel-item-next,
    .carousel-fade .carousel-item-prev,
    .carousel-fade .carousel-item-prev.active,
    .carousel-fade .carousel-item.active {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0)
    }
    
    @supports (transform-style:preserve-3d) {
    
        .carousel-fade .carousel-item-left.active,
        .carousel-fade .carousel-item-next,
        .carousel-fade .carousel-item-prev,
        .carousel-fade .carousel-item-prev.active,
        .carousel-fade .carousel-item.active {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0)
        }
    }
    
    .carousel-fade .carousel-item-left.active,
    .carousel-fade .carousel-item-next,
    .carousel-fade .carousel-item-prev,
    .carousel-fade .carousel-item-prev.active,
    .carousel-fade .carousel-item.active {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
    
    @-webkit-keyframes fadeInLeft {
        from {
            opacity: 0;
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0)
        }
    
        to {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0)
        }
    }
    
    @keyframes fadeInLeft {
        from {
            opacity: 0;
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0)
        }
    
        to {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0)
        }
    }
    
    .fadeInLeft {
        -webkit-animation-name: fadeInLeft;
        animation-name: fadeInLeft
    }
    
    @-webkit-keyframes fadeInUp {
        from {
            opacity: 0;
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0)
        }
    
        to {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0)
        }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0)
        }
    
        to {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0)
        }
    }
    
    .fadeInUp {
        -webkit-animation-name: fadeInUp;
        animation-name: fadeInUp
    }
    
    @-webkit-keyframes slideInRight {
        from {
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
            visibility: visible
        }
    
        to {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0)
        }
    }
    
    @keyframes slideInRight {
        from {
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
            visibility: visible
        }
    
        to {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0)
        }
    }
    
    .slideInRight {
        -webkit-animation-name: slideInRight;
        animation-name: slideInRight
    }
    </style>
    <div id="app" style="">
        <div class="header2 bg-success-gradiant">
            <div class="">
                <!-- Header 1 code -->
                <nav  style="background-color: #7170b9" class="navbar navbar-expand-lg navbar-dark  h2-nav"> <a class="navbar-brand" href="{{route('home')}}">NamaStore</a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header2" aria-controls="header2" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-menu"></span> </button>
                    <div class="collapse navbar-collapse hover-dropdown" id="header2">
                        <ul class="navbar-nav">
                            <li class="nav-item active "><a class="nav-link" href="{{route('orders')}}">MyOrders</a></li>                          
                            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                                <a class="btn " href="{{route('cart.index')}}"><i style="color: white" class="fas fa-shopping-cart"></i>  <span class="badge badge-danger">{{\Cart::getTotalQuantity()}}</span></a>
                              </li>
                          @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @endguest
                             @auth 
                              @if(Auth::user()->is_admin)
                              <li class="nav-item ">
                                <a class="nav-link" href="{{route('admin.dashboard')}}"> Dashboard</a>
                              </li> 
                              @else
                              <li class="nav-item active"><a class="nav-link" href="#"><i class="icon-bubble"></i> Need help?</a></li>

                              @endif 
                            
                             
                             
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
    
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item btn  btn-sm " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                              @endauth
                            
                            
                        </ul>
                    </div>
                </nav> 
               
            </div>
          
        </div>
       <br><br>
        <main class=""> 
           
            @yield('content')
           
        </main>
        
    </div>
    <!-- Footer -->
<footer class="page-footer font-small elegant-color" style="background-color: #c8c8eb">

    <div class="color-primary">
      <div class="container">
  
        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">
  
          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0">Get connected with us on social networks!</h6>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">
  
            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fab fa-facebook-f white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fab fa-twitter white-text mr-4"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g white-text mr-4"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fab fa-linkedin-in white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram white-text"> </i>
            </a>
  
          </div>
          <!-- Grid column -->
  
        </div>
        <!-- Grid row-->
  
      </div>
    </div>
  
    <!-- Footer Links -->
    <div class="container text-center text-md-left pt-4 pt-md-5">
  
      <!-- Grid row -->
      <div class="row mt-1 mt-md-0 mb-4 mb-md-0">
  
        <!-- Grid column -->
        <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">
  
          <!-- Links -->
          <h5>About me</h5>
          <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">
  
          <p class="foot-desc mb-0">Here you can use rows and columns to organize your footer content. Lorem
            ipsum dolor sit amet,
            consectetur
            adipisicing elit.</p>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">
  
          <!-- Links -->
          <h5>Partners</h5>
          <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">
  
          <ul class="list-unstyled foot-desc">
            <li class="mb-2">
              COCACOLA
            </li>
            <li class="mb-2">
              OMO
            </li>
            <li class="mb-2">
              DANONE
            </li>
            <li class="mb-2">
              JIBAL
            </li>
          </ul>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">
  
          <!-- Links -->
          <h5>Useful links</h5>
          <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">
  
          <ul class="list-unstyled foot-desc">
            <li class="mb-2">
              <a href="#!">Your Account</a>
            </li>
            <li class="mb-2">
              <a href="#!">Become an Affiliate</a>
            </li>
            <li class="mb-2">
              <a href="#!">Shipping Rates</a>
            </li>
            <li class="mb-2">
              <a href="#!">Help</a>
            </li>
          </ul>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">
  
          <!-- Links -->
          <h5>Contacts</h5>
          <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">
  
          <ul class="fa-ul foot-desc ml-4">
            <li class="mb-2"><span class="fa-li"><i class="far fa-map"></i></span>Hay Hassani, Avenue Street 10
            </li>
            <li class="mb-2"><span class="fa-li"><i class="fas fa-phone-alt"></i></span>042 876 836 908</li>
            <li class="mb-2"><span class="fa-li"><i class="far fa-envelope"></i></span>Namastore@gmail.com</li>
            <li><span class="fa-li"><i class="far fa-clock"></i></span>Monday - Friday: 10-17</li>
          </ul>
  
        </div>
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
    <!-- Copyright -->
    <div class="footer-copyright text-center pb-5">© 2020 Copyright:
      <a > Namastore.com</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->
</body>
<script>$(document).ready(function(){

  $('#myCarousel').carousel({
  interval: 3000,
  })
  
  });</script>
</html>
