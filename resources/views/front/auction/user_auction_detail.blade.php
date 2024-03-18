@extends('layouts.front')


@section('content')
<div class="inner-banner">
         <div class="container">
            <h2 class="inner-banner-title  wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s">Auction Details</h2>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Auction Details</li>
               </ol>
            </nav>
         </div>
      </div>
      <div class="auction-details-section pt-120">
         <img alt="image" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
         <img alt="image" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
         <div class="container">
            <div class="row g-4 mb-50">
               <div class="col-xl-6 col-lg-7 d-flex flex-row align-items-start justify-content-lg-start justify-content-center flex-md-nowrap flex-wrap gap-4">
                  <div class="tab-content mb-4 d-flex justify-content-lg-start justify-content-center  wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                     <div class="tab-pane big-image fade show active" id="gallery-img1">
                        
                        <img alt="image" src="{{asset('front_assets/images/bike-1.jpg') }}" class="img-fluid">
                     </div>
                     <div class="tab-pane big-image fade" id="gallery-img2">
                        <div class="auction-gallery-timer d-flex align-items-center justify-content-center">
                           <h3 id="countdown-timer-2">&nbsp;</h3>
                        </div>
                        <img alt="image" src="{{asset('front_assets/images/bg/prod-gallery2.png') }}" class="img-fluid">
                     </div>
                     <div class="tab-pane big-image fade" id="gallery-img3">
                        <div class="auction-gallery-timer d-flex align-items-center justify-content-center">
                           <h3 id="countdown-timer-3">&nbsp;</h3>
                        </div>
                        <img alt="image" src="{{asset('front_assets/images/bg/prod-gallery3.png') }}" class="img-fluid">
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-5">
                  <div class="product-details-right  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                     <h3>Lorem Ipsum is simply dummy text of the printing</h3>
                     <p class="para">Lorem ipsum dolor amet, consectetur adipiscing elit. Maece nas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                     <h4>Company Price: <span>Lorem ipsum</span></h4>
                     <h4>Location: <span>Lorem ipsum</span></h4>
                     <div class="bid-form">
                        <div class="form-title">
                           <h5>Code</h5>
                           <p>This is your code</p>
                        </div>
                        <form>
                           <div class="form-inner gap-2">
                              4886527843568
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            </div>
      </div>
@endsection
