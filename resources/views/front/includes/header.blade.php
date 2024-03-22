<header class="header-area style-1">
         <div class="header-logo">
            <a href="{{ route('home') }}"><img alt="image" src="{{asset('images/main-logo.png') }}"></a>
         </div>
         <div class="main-menu">
            <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
               <div class="mobile-logo-wrap ">
                  <a href="{{ route('home') }}"><img alt="image" src="{{asset('images/main-logo.png') }}"></a>
               </div>
               <div class="menu-close-btn">
                  <i class="bi bi-x-lg"></i>
               </div>
            </div>
            <ul class="menu-list">
               <li class="menu-item-has-children"><a href="{{ route('home') }}">Home</a></li>
              
               @if (Auth::check() && Auth::guard('web')->user()->company)
               <li><a href="{{ route('active-auctions') }}">Active Auctions</a></li>
               @endif
               <li><a href="{{ route('categories') }}">Categories</a></li>
               <li><a href="{{ route('about') }}">About</a></li>
               <li><a href="{{ route('contact') }}">Contact </a></li>
            </ul>
            <div class="d-lg-none d-block">
               <form class="mobile-menu-form mb-5">
                  <div class="input-with-btn d-flex flex-column">
                     <input type="text" placeholder="Search here...">
                     <button type="submit" class="eg-btn btn--primary btn--sm">Search</button>
                  </div>
               </form>
            </div>
         </div>
         @if (Auth::check())
         <div class="nav-right d-flex align-items-center">
            <div class="user-new-menu-icon">
               <a href="{{ route('dashboard') }}"><img src="{{asset('front_assets/images/user-icon/user.png') }}"></a>
            </div>
            <div class="user-new-menu-icon">
               <img src="{{asset('front_assets/images/user-icon/chat.png') }}">
            </div>
            <div class="user-new-menu-icon">
            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                  <img src="{{asset('front_assets/images/user-icon/logout.png') }}"></a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
            </div>
            <div class="mobile-menu-btn d-lg-none d-block">
               <a href="{{ route('home') }}"><i class="bx bx-menu"></i></a>
            </div>
         </div>
         @else
         <div class="nav-right d-flex align-items-center">
            <div class="search-btn">
               <i class="bi bi-search"></i>
            </div>
            <div class="eg-btn btn--primary header-btn me-2">
               <a href="{{ route('login') }}">Login</a>
            </div>
            <div class="eg-btn btn--primary header-btn">
               <a href="{{ route('register') }}">Register</a>
            </div>
            <div class="mobile-menu-btn d-lg-none d-block">
               <i class="bx bx-menu"></i>
            </div>
         </div>
         @endif
      </header>


