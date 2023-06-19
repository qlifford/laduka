
<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>Products</span>
         </h2>
      </div>
      <div class="row">

         @foreach ($product as $products)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product_details',$products->id)}}" class="option1">
                  View More
                     </a>
                  <form action="{{url('/add_cart',$products->id)}}" method="POST" enctype="multipart/form-data">
                     @csrf
                      <div class="row">
                        <div class="col-md-4">
                        <input type="number" value="1" style="width: 100%" min="1" name="quantity">
                     </div>
                        <div class="col-md-6">
                           <input type="submit" value="Buy Now">
                        </div>
                     </div> 
                  </form>
                  </div>
               </div>
               <div class="img-box">
                  <img src="product/{{$products->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{$products->title}}
                  </h5>

                     @if ($products->discount_price!=null)
                     <h6 style="color: red">
                        Now
                        <br>
                        Kshs {{$products->discount_price}}
                     </h6>
                     <h6 style="text-decoration: line-through; color: blue;">
                        Was
                        <br>
                           Kshs {{$products->price}}
                     </h6>
                     @else                        
                  <h6  style="color: blue">
                     Kshs {{$products->price}}
                  </h6>
                  @endif
               </div>
            </div>
         </div>            
         @endforeach
         <span style="padding-top:20px;">
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
         </span>
         {{--<span>{!!$product->appends(Request::all())->links()!!}</span>--}}
         
      </div>
   </div>
</section>