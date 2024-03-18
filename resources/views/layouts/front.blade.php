<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   
      <link rel="icon" href="{{asset('front_assets/images/bg/sm-logo.png') }}" type="image/gif" sizes="20x20">
      <script src="https://kit.fontawesome.com/5dd98f56af" crossorigin="anonymous"></script>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="{{asset('front_assets/css/animate.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/all.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/boxicons.min.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap-icons.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/jquery-ui.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/swiper-bundle.min.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/slick-theme.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/slick.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/nice-select.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/magnific-popup.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/odometer.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/style.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/style-new.css') }}">
      <link rel="stylesheet" href="{{asset('front_assets/css/user.css') }}">
      @yield('page-css-script')

    

</head>
<body>
    <div id="app" >
    <div class="preloader">
         <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
         </div>
      </div>
      <div class="mobile-search">
         <div class="container">
            <div class="row d-flex justify-content-center">
               <div class="col-md-11">
                  <label>What are you lookking for?</label>
                  <input type="text" placeholder="Search Products, Category, Brand">
               </div>
               <div class="col-1 d-flex justify-content-end align-items-center">
                  <div class="search-cross-btn">
                     <i class="bi bi-x"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>    
        @include("front.includes.header")
       
            @yield('content')
      
        @include("front.includes.footer")
    </div>
 
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{asset('front_assets/js/jquery-3.6.0.min.js') }}"></script>
      <script src="{{asset('front_assets/js/jquery-ui.js') }}"></script>
      <script src="{{asset('front_assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{asset('front_assets/js/wow.min.js') }}"></script>
      <script src="{{asset('front_assets/js/swiper-bundle.min.js') }}"></script>
      <script src="{{asset('front_assets/js/slick.js') }}"></script>
      <script src="{{asset('front_assets/js/jquery.nice-select.js') }}"></script>
      <script src="{{asset('front_assets/js/odometer.min.js') }}"></script>
      <script src="{{asset('front_assets/js/viewport.jquery.js') }}"></script>
      <script src="{{asset('front_assets/js/jquery.magnific-popup.min.js') }}"></script>
      <script src="{{asset('front_assets/js/main.js') }}"></script>    
 @yield('page-js-script')
    
</body>
</html>
