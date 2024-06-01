@extends('layouts.front')

@section('content')
<div class="hero-area hero-style-one">
         <div class="hero-main-wrapper position-relative">
            <div class="swiper banner1">
               <div class="swiper-wrapper">
                @foreach($homes as $home)

               <div class="swiper-slide">
                     <div class="slider-bg-1" style="background-image: url({{asset('uploads/home/'.$home->photo->file)}})!important;">
                        <div class="container">
                           <div class="row d-flex justify-content-center align-items-center">
                              <div class="col-xl-10 col-lg-10">
                                 <div class="banner1-content">
                                    <span>Welcome</span>
                                    <h1>{{ $home->title }}</h1>
                                    <p>
                                       {{ $home->description }}
                                    </p>
                                    @if (!Auth::check())
                                    <a href="{{ route('login') }}" class="eg-btn btn--primary btn--lg">Login</a>
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

               @endforeach  
                  
               </div>
            </div>
            <div class="hero-one-pagination d-flex justify-content-center flex-column align-items-center gap-3"></div>
         </div>
      </div>
      
      @if (Auth::check())
      <div id="counter-main">
         <div class="container">
            <div class="row p-5">
               <div class="col-md-3 col-sm-6">
                   <a href="{{ route('all-auction', ['auction' => 'all']) }}">
                  <div class="card">
                     <div class="card-body">
                     
                        <div class="d-flex align-items-center justify-content-between">
                              <div>
                              <span class="text-muted fw-bolder">All Auctions</span>
                                 <h4 ></h4>
                              </div>
                              <div class="text-dark fw-bold fs-1">{{ $auction_all }}</div>
                        </div>
                        <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                     </div>
                  </div>  
                   </a> 
            </div>

            <div class="col-md-3 col-sm-6">
                 <a href="{{ route('all-auction', ['auction' => 'active']) }}">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                              <div>
                              <span class="text-muted fw-bolder">Active Auctions</span>
                                 <h4></h4>
                              </div>
                              <div class="text-dark fw-bold fs-1">{{ $current_all  }}</div>
                        </div>
                        <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                     </div>
                  </div> 
                   </a> 
            </div>

            <div class="col-md-3 col-sm-6">
                 <a href="{{ route('all-auction', ['auction' => 'complet']) }}">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                              <div>
                              <span class="text-muted fw-bolder">Completed Auctions</span>
                                 <h4></h4>
                              </div>
                              <div class="text-dark fw-bold fs-1">{{ $end_all  }}</div>
                        </div>
                        <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                     </div>
                  </div>  
                  </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="{{ route('all-auction', ['auction' => 'cancel']) }}">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                              <div>
                              <span class="text-muted fw-bolder">Cancelled Auctions</span>
                                 <h4></h4>
                              </div>
                              <div class="text-dark fw-bold fs-1">{{ $cancel_all }}</div>
                        </div>
                        <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                     </div>
                  </div>  
                  </a>
            </div>
            </div>
         </div>
      </div>
      @endif
      <!-- categories-start -->
      <div id="categories-main">
         <div class="container">
            <div class="row pb-5">
               <div class="category-main-text mt-5">
                  <h2 class="text-center">Top Featured <span class="color-diff"> Categories </span></h2>
                  <p class="text-center text-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                     <br> labore et dolore magna aliqua
                  </p>
               </div>
               <div class="row category-row mt-5">
               @foreach($categories as $category)
                  <div class="col-md-2 cate-box-home">
                     <a href="{{ Auth::check() && Auth::guard('web')->user()->role == 2 ? url('/active-auctions').'?cat='.$category->id : url('/new-auction/'.$category->id) }}">
                        <div style="background-color: #7BAB47;" class="category-main-box">
                           <div class="category-img">
                              <img src="{{Auth::check() && Auth::guard('web')->user()->role == 2 ? asset('uploads/category/'.@$category->category->photo->file) : asset('uploads/category/'.@$category->photo->file) }}">
                           </div>
                           <h5 class="text-white text-16 mb-0">{{ Auth::check() && Auth::guard('web')->user()->role == 2 ? @$category->category->title : $category->title }}</h5>
                        </div>
                     </a>
                  </div>
                @endforeach  
                 
               </div>
            </div>
         </div>
      </div>
      <!-- categories-end -->
      <!-- About-start -->
      <div id="about-main" class="py-5">
         <div class="container">
            <div class="row mt-3">
               <div class="col-md-6 about-main-img">
                  <img src="{{asset('front_assets/images/about-image-2.png') }}">
               </div>
               <div class="col-md-6 about-content d-flex justify-content-center flex-column">
                  <h5 class="">About</h5>
                  <h2 class="">{{ $about->title }}</h2>
                  <p class="text-16 color-p"> 
                  {{ $about->description }}
                  </p>
                  <a href="user-about.html"><button type="button" class="btn register-btn text-16">
                  Read more
                  </button></a>
               </div>
            </div>
         </div>
      </div>
      <!-- About-end -->      

@endsection
