<!DOCTYPE html>
<html>
<head>
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
    <title>Laduka | Cart</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style class="text/css">
    .center{
        margin: auto;
        width: 50%;
        text-align: center;
        padding: 30px;
    }
    .tbl_center{
        margin: auto;
        width: 100%;
        height: 50%;
    }
    table,th,td{
        border: 1px solid grey;
    }
    .th_deg{
        font-size: 20px;
        background: skyblue
    }
    .img_deg{
        height: 150px;
        width: 150px;
    }
    .total_deg{
        font-size: 30px;
        padding: 40px;
    }

    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <div class="center">
            {{-- success message --}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>                    
            @endif
            <table class="tbl_center">
                <tr class="th_deg">
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <?php
                $total_price = 0;
                ?>
                @foreach ($cart as $cart)
                    <tr>               
                        <td>{{$cart->product_title}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td>Kshs {{$cart->price}}</td>
                        <td class="">
                            <img src="product/{{$cart->image}}" class="img_deg" alt="">
                        </td>
                        <td>
                            <a href="{{url('remove_cart',$cart->id)}}" onclick="return confirm('Are you sure you want to remove this item from cart')" class="btn btn-warning btn-sm">Remove</a>                            
                        </td>
                    </tr>
                    <?php
                    $total_price = $total_price + $cart->price;
                    ?>
                @endforeach                
            </table>
            <div class="total_deg">
                <h1 class="">Total Price : Kshs {{$total_price}}</h1>
            </div>
            <h1 style="font-size: 25px; padding-bottom:15px;">Payment Mode : </h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Pay Offline</a>
            <a href="{{URL('stripe',$total_price)}}" class="btn btn-primary">Pay Online</a>
        </div>
    </div>
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