    <!DOCTYPE html>
    <html lang="en">
    <head>

    @include('admin.css')     
    <style type="text/css">
    .center{
        margin: auto;
        width: 80%;
        border: 2px solid white;
        text-align: center;
        margin-top: 20px;
    }
    .text-center{
        text-align: center;
        font-size: 40px;
        padding: 20px;
    }
    .img{
        width: 100px;
        height: 100px;
    }
    .th_deg{
        padding: 20px;
    }
    </style>
    <!-- Required meta tags -->
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    </head>
    <body>
    <div class="container-scroller">
    @include('admin.sidebar')
    @include('admin.header')
    <div class="main-panel">
        <div class="content-wrapper">

                {{-- success message --}}
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>                    
            @endif

            <h2 class="text-center">List of Products </h2>
            <table class="table table-stripped">
                <tr class="th_deg bg-light">
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                @foreach ($product as $product)                
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>
                        <img src="/product/{{$product->image}}" class="" alt="Image">
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure u want to delete this Product?')" href="{{url('/delete_product',$product->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                    
                    <td>
                        <a href="{{url('/update_product',$product->id)}}" class="btn btn-secondary">Edit</a>
                    </td>
                
                </tr>
                @endforeach
            </table>

        </div>
    </div>
    @include('admin.script')           

    </html>