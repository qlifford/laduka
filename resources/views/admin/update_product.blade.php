<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public">
    @include('admin.css') 
    <style class="text/css">
        .prod_center 
        {
            text-align: center;
            padding-top: 20px;
        }
        .font_size{
            font-size: 40px;
        }
        .prod_input_color{
            color: black;
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 250px;
        }
        .div_design{
            padding-bottom: 15px;

        }
    </style>
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


                <div class="prod_center">
                    <h2 class="font_size">Edit a Product</h2>
                    <form action="{{url('/update_product_confirm',$product)}}" method="post" enctype="multipart/form-data">

                        @csrf
                    
                        <div class="div_design mt-3">
                            <label for="">Product Name : </label>
                            <input type="text" class="prod_input_color" name="title" placeholder="Product Title" value="{{$product->title}}">
                        </div>

                        <div class="div_design">
                            <label for="">Product Description : </label>
                            <input type="text" class="prod_input_color" name="description" value="{{$product->description}}" placeholder="Description">
                        </div>

                        <div class="div_design">
                            <label for="">Product Price : </label>
                            <input type="number" class="prod_input_color" value="{{$product->price}}" name="price" placeholder="Product Price">
                        </div>

                        <div class="div_design">
                            <label for="">Product Quantity</label>
                            <input type="number" class="prod_input_color" min="0" name="quantity" value="{{$product->quantity}}" placeholder="Quantity">
                        </div>

                        <div class="div_design">
                            <label for="">Discount Price : </label>
                            <input type="text" class="prod_input_color" name="discount"  value="{{$product->discount_price}}"placeholder="Discount Price">
                        </div>
                        
                        <div class="div_design">
                            <label for="">Product Category : </label>
                            <select  class="prod_input_color" name="category">
                                <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                                
                                @foreach ($category as $category)
                                    <option>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="div_design">
                            <label for="">Current Product Image : </label>
                            <img style="margin: auto" src="product/{{$product->image}}" height="100" width="100">                            
                        </div>

                        <div class="div_design">
                            <label for="">Change Product Image : </label>
                            <input type="file" class="prod_input_color" value="" name="image">
                        </div>

                        <div class="div_design">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('admin.script')           
    
</html>