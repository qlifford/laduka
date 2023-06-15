  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      @include('admin.css') 
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
          @include('admin.body')           
          @include('admin.script')           
      
  </html>