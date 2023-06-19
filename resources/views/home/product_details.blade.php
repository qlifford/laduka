<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Laduka | Product Details</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
    
        <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width: 50%; padding: 30px;">
            <div class="box">
            <div class="option_container">
                <div class="options">
                    <a href="{{url('product_details',$product->id)}}" class="option1">
                    
                        {{-- <h1 class="text-center">Product Details</h1> --}}
                </div>
            </div>
            <div class="img-box">
                <img src="product/{{$product->image}}" alt="">
            </div>
            <div class="detail-box">
                <h5>
                    {{$product->title}}
                </h5>

                    @if ($product->discount_price!=null)

                    <h6 style="color: rgb(255, 0, 81);">                   
                    NOW : Kshs {{$product->discount_price}}
                    </h6>
                    <h6 style="text-decoration: line-through; color: blue;">
                        Price : Kshs {{$product->price}}
                    </h6>
                    @else                        
                <h6  style="color: blue">
                    Kshs {{$product->price}}
                </h6>
                @endif
                <h6>
                    Product Category : {{$product->category}}
                </h6>
                <h6>
                    Product Description : 
                    {{$product->description}}
                </h6>
                <h6>
                    Quantity Available : 
                    {{$product->quantity}}
                </h6>
                {{-- <a href="" class="btn btn-primary">Add to Cart </a> --}}
                <form action="{{url('/add_cart',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-4" py-3>
                    <input type="number" value="1" style=width: 100%; min="1" name="quantity">
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-secondary sm" value="Add to Cart">
                    </div>
                    </div> 
                </form>
            </div>
        </div>
    </div> 
    
    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
        
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        
        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>
</html>