<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
@include('admin.css') 
<style class="text/css">
.title_deg{
    text-align: center;
    font-size: 25px;
    font-weight: bold;
}
.table-content{
    width: 100%;
    margin: auto;
    border-collapse: collapse;
    min-width: 400px;
}
.table-content th{
   background-color: #4a4848;
   color: #fff;
   text-align: left;
   font-weight: bold;
   border: #e8e3e3;
}
.table-content td:nth-last-of-type(even){
    background-color: #4a4848;
}
.table-content td{
    width: 250px;
}
tr{
    border-bottom: 1px solid #989494;    
}
.table-content tr.active-row{
    font-weight: bold;    
}
.img_size{
    height: 25px;
}


</style>
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
            <h1 class="title_deg mb-3">All Orders</h1>
            <div class="" style="padding-bottom: 20px;">
                <form action="{{url('search')}}" method="GET">

                    @csrf

                    <input type="text" name="search" placeholder="Search Orders" style="color: black;">
                    <input type="submit" class="btn btn-outline-primary" value="Search">
                </form>
            </div>
            <table class="table-content">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Delivered</th>
                    <th>Print Pdf</th>
                    <th>Send Mail</th>
                </tr>
                @forelse($order as $order)
                    
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        <img src="/product/{{$order->image}}" alt="" class="img_size">
                    </td>
                    <td>
                        @if ($order->delivery_status=='proccessing')
                            <a href="{{url('delivered', $order->id)}}" onclick="return confirm('Please confirm delivery')" class="btn btn-secondary">Confirm</a>
                        @else
                       <p style="color: rgb(255, 128, 0)">Done</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{url('print_pdf', $order->id)}}" class="btn btn-warning">Print</a>
                    </td>
                    <td>
                        <a href="{{url('send_mail', $order->id)}}" class="btn btn-info">Send Mail</a>
                    </td>
                    
                </tr>
                @empty
                <tr>
                    <td td colspan="16">
                        No record found
                    </td>
                </tr>                    
              
                @endforelse
            </table>
        </div>
    </div>
</div>
    @include('admin.script')

</html>