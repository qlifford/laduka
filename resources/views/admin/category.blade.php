<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
@include('admin.css') 
<style class="text/css">
.bg{
    background-color: rgb(7, 57, 7);
}
.center 
{
    text-align: center;
    padding-top: 20px;
}
.h2_font{
    font-size: 35px;
    padding-bottom: 40px;
}
.input_color
{
    color: #000;
}
.tbl_center {
    margin: auto;
    width: 50%;
    text-align: center;
    margin-top: 30px;
    border: 3px solid white;
    
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

            {{-- success message --}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>                    
            @endif

            <div class="center">
                <h2 class="h2_font">Add a Category</h2>
                <form action="{{url('/add_category')}}" method="post">

                    @csrf

                    <input type="text" class="input_color" name="category" placeholder="Enter Category Title">
                    <input type="submit" name="submit" value=" Add category" class="btn btn-primary">
                </form>
            </div>

        <table class="tbl_center table table-stripped">
                <tr class="bg">
                    <th>Category Name</th>
                    <th class="span-span">Action</th>
                    <th ></th>
                
                </tr>

                @foreach ($data as $data)                        
                <tr>
                    <td>{{$data->category_name}}</td>
                    {{-- confirmation message --}}
                    <td>
                        <a onclick="return confirm('Are you sure u want to delete this category?')" class="btn btn-danger" href="{{url('delete_category', $data->id)}}">Delete</a>
                    </td>
                    {{-- <td>
                        <a href="{{url('edit_category', $data->id)}}" class="btn btn-secondary">Edit</a>
                    </td> --}}
                </tr>
                @endforeach
            </table>
        </div>        
    </div>        
    @include('admin.script')

</html>