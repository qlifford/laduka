<html>
<head>
    <title>Laduka | Order Details</title>
</head>
<body>
    <h1>Order Details</h1>
    Customer Name:<h3>{{$order->name}}</h3>
    Customer Email:<h3>{{$order->email}}</h3>
    Customer Phone No:<h3>{{$order->phone}}</h3>
    Customer address:<h3>{{$order->address}}</h3>
    Customer Id:<h3>{{$order->user_id}}</h3>
    Price:<h3>{{$order->price}}</h3>
    Quantity :<h3>{{$order->quantity}}</h3>
    Payment Status:<h3>{{$order->payment_status}}</h3>
    Delivery Status:<h3>{{$order->delivery_status}}</h3>
    Product Id:<h3>{{$order->id}}</h3>
    Product Name:<h3>{{$order->product_title}}</h3>
    <img src="product/{{$order->image}}" alt="" style="width: 200px;">
    
</body>
</html>