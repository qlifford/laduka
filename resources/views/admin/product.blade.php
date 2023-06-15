<!DOCTYPE html>
<html lang="en">
    <head>
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
                    <h2 class="font_size">Add a Product</h2>
                    <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">

                        @csrf
                    
                        <div class="div_design mt-3">
                            <label for="">Product Name : </label>
                            <input type="text" class="prod_input_color" name="title" placeholder="Product Title" required>
                        </div>

                        <div class="div_design">
                            <label for="">Product Description : </label>
                            <input type="text" class="prod_input_color" name="description" placeholder="Description">
                        </div>

                        <div class="div_design">
                            <label for="">Product Price : </label>
                            <input type="number" class="prod_input_color" name="price" placeholder="Product Price">
                        </div>

                        <div class="div_design">
                            <label for="">Product Quantity</label>
                            <input type="number" class="prod_input_color" min="0" name="quantity" placeholder="Quantity">
                        </div>

                        <div class="div_design">
                            <label for="">Discount Price : </label>
                            <input type="text" class="prod_input_color" name="discount" placeholder="Discount Price">
                        </div>
                        
                        <div class="div_design">
                            <label for="">Product Category : </label>
                            <select  class="prod_input_color" name="category">
                                <option value="category_name" selected="">Select a Category</option>
                                @foreach ($category as $category)
                                    <option>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="div_design">
                            <label for="">Product Image : </label>
                            <input type="file" class="prod_input_color" value="" name="image" required>
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