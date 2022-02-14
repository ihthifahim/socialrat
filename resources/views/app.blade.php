<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | SocialRat</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

      <!-- Bootstrap Css -->
      <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        

        
    </head>
    <body data-sidebar="dark">
       
        
        @include('layout.header')
        @include('layout.sidebar')

        <div class="main-content">
        @yield('content')


        <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © SocialRat.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Wavemaker Digital
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>


        </div><!-- end of div main- content -->


    </body>


   
          <!-- JAVASCRIPT -->
          <script src="/assets/libs/jquery/jquery.min.js"></script>
          <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
          <script src="/assets/libs/simplebar/simplebar.min.js"></script>
          <script src="/assets/libs/node-waves/waves.min.js"></script>
      
          <script src="/assets/js/app.js"></script>
          <script src="/js/app.js"></script>
   
</html>
