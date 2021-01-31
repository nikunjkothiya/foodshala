<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Metas -->
    <title>Food Shala</title>

    <!-- Site Icons -->
  <!--  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">  -->
    <link rel="icon" href="{{asset('images/my-logo.jpg')}}">
    <link rel="apple-touch-icon" href="{{asset('images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('images/my-logo.jpg')}}" alt="" />
                </a>

                @if (session()->has('message'))
                <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {!! session()->get('message') !!}
                    </strong>
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {!! session()->get('error') !!}
                    </strong>
                </div>
                @endif


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item active"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register Restaurant</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('customer_registration') }}">Register Customer</a></li>
                        @endguest
                        @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- Start slides -->
 
    <div id="slides" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="{{asset('images/slider-01.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br>The Food Shala</strong></h1>
                            <p class="m-b-40">“I know once people get connected to real food, they never change back.” </br>
                            “Food is symbolic of love when words are inadequate.”
                            </p> 
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-left">
                <img src="{{asset('images/slider-02.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br>The Food Shala</strong></h1>
                            <p class="m-b-40">“Food for us comes from our relatives, whether they have wings or fins or roots. That is how we consider food. Food has a culture. It has a history. It has a story. It has relationships.”</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End slides -->

    <!-- Start Menu -->
    <div class="menu-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>All Special Menu's</h2>
                        <p>Menus from all the Best Restaurants</p>
                    </div>
                </div>
            </div>

            <div class="row inner-menu-box">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Vegeterian</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Non-Vegeterian</a>
                    </div>
                </div>

                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                            @if(isset($vegFoods))
                                @foreach($vegFoods as $key => $value)
                                <form method="POST" action=" {{ route('order_food') }}" class="col-lg-4 col-md-6 special-grid">
                                    @csrf
                                    <div >
                                        <div class="gallery-single fix">
                                            <img src="{{asset(''.$value->image)}}" class="img-fluid" alt="Image" style="height:200px; width:260px;">
                                            <div class="why-text">
                                                <h4>{{$value->name ?? ''}}</h4>
                                                <p>{{$value->description ?? ''}}</p>
                                            </div>
                                        </div>
                                        <h5><strong> ₹ {{$value->price ?? ''}} / Item </strong></h5>
                                        <input type="hidden" value="{{$value->id}}" name="food_id">
                                        <input type="hidden" value="{{$value->restaurant_details->id ?? ""}}" name="restaurant_id">
                                        <h5> {{$value->restaurant_details->name ?? ''}}</h5>
                                        <h6> {{$value->restaurant_details->address ?? ""}}</h6>
                                        <button type="submit" class="abc" style="color: #008000;background-color: transparent;border: 2px solid #d65106;border-radius: 5px;">Order Now</button>
                                    </div>
                                </form>
                                @endforeach
                            @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="row">
                            @if(isset($nonvegFoods))
                                @foreach($nonvegFoods as $key => $value)
                                <form method="POST" action=" {{ route('order_food') }}" class="col-lg-4 col-md-6 special-grid">
                                    @csrf
                                    <div>
                                        <div class="gallery-single fix">
                                         @if(isset($value->image))
                                            <img src="{{asset(''.$value->image)}}" class="img-fluid" alt="Image" style="height:200px; width:260px;">
                                         @else
                                            <img src="{{asset('images/no-image.jpg')}}" class="img-fluid" alt="Image" style="height:200px; width:260px;">
                                         @endif
                                            <div class="why-text">
                                                <h4>{{$value->name ?? ''}}</h4>
                                                <p>{{$value->description ?? ''}}</p>
                                            </div>
                                        </div>
                                        <h5><strong> ₹ {{$value->price ?? ''}} / Item</strong></h5>
                                        <input type="hidden" value="{{$value->id}}" name="food_id">
                                        <input type="hidden" value="{{$value->restaurant_details->id ?? ""}}" name="restaurant_id">
                                        <h5> {{$value->restaurant_details->name ?? ''}}</h5>
                                        <h6> {{$value->restaurant_details->address ?? ""}}</h6>
                                        <button type="submit" class="abc" style="color: #c60a0a;background-color: transparent;border: 2px solid #d65106;border-radius: 5px;">Order Now</button>
                                    </div>
                                </form>
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Menu -->

    <!-- Start Footer -->
    <footer class="footer-area">
        <div class="copyright">
            <div class="container">
                    <div class="col-lg-12">
                        <p class="company-name">All Rights Reserved. &copy; 2021 <a href="#">By Food Shala</a> Design By :
                            <a href="#">Nikunj Kothiya</a>
                        </p>
                    </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

    <!-- ALL JS FILES -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUG -->
    <script src="{{asset('js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('js/images-loded.min.js')}}"></script>
    <script src="{{asset('js/isotope.min.js')}}"></script>
    <script src="{{asset('js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('js/form-validator.min.js')}}"></script>
    <script src="{{asset('js/contact-form-script.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>

    <script type="text/javascript">

    </script>
</body>

</html>