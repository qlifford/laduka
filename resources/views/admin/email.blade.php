<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css') 
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style type="text/css">
      label{
        display: inline-block;
        width: 300px;
        padding: 15px;
        font-weight: bold;
        font-size: 20px;
      }
   
    </style>
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
              <div class="container">
                <h1 style="text-align: center; font-size: 25px; font-size: 30px; font-weight: bold;">Send Email to {{$order->email}}</h1>
                  <form action="{{url('send_user_mail', $order->id)}}" method="POST" class="text-center mt-3">

                      @csrf

                    <div>
                        <label>Email Greeting : </label>
                        <input style="color: black;" type="text" name="greeting">
                    </div>
                    <div class="">
                        <label>Email Firstling : </label>
                        <input style="color: black;" type="text" name="firstline">
                    </div>
                    <div class="">
                    <div class="">
                        <label>Email Body : </label>
                        <input style="color: black;" type="text" name="body">
                    </div>
                    <div class="">
                        <label>Email Button : </label>
                        <input style="color: black;" type="text" name="button">
                    </div>
                    <div class="">
                        <label>Email Url : </label>
                        <input style="color: black;" type="text" name="url">
                    </div>
                    <div class="">
                        <label>Email Last Line : </label>
                        <input style="color: black;" type="text" name="lastline">
                    </div>
                  
                    <div class="float-right">
                      <input href="{{url('send_mail', $order->id)}}" class="btn btn-primary mt-3" type="submit" value="Send Email" type="submit">
                  </div>
                </form>
                
              </div>
            </div>
        </div>
        @include('admin.script')           
    
</html>