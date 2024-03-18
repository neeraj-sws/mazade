@extends('layouts.front')


@section('content')
<div class="inner-banner">
         <div class="container">
            <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Lorem Ipsum</h2>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Lorem Ipsum</li>
               </ol>
            </nav>
         </div>
      </div>
      <div class="live-auction-section pt-120 pb-120">
         <img alt="image" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
         <img alt="image" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
         <div class="container">
            <div class="row gy-4 mb-60 d-flex justify-content-center">
               <div class="col-lg-4 col-md-6 col-sm-10 ">
                  <div data-wow-duration="1.5s" data-wow-delay="0.2s" class="eg-card auction-card1 wow fadeInDown">
                     <div class="auction-img">
                        <img alt="image" src="{{asset('front_assets/images/bike-1.jpg') }}">
                        <div class="auction-timer">
                           <div class="countdown" id="timer1">
                              <h4><span id="hours1">05</span>H : <span id="minutes1">52</span>M : <span id="seconds1">32</span>S</h4>
                           </div>
                        </div>
                     </div>
                     <div class="auction-content">
                        <h4><a href="user-auction-details.html">Lorem Ipsum is simply dummy text of the printing</a></h4>
                        <p>Bidding Price : <span>$85.9</span></p>
                        <div class="auction-card-bttm">
                           <a href="user-auction-details.htmluser-auction-details.html" class="eg-btn btn--primary btn--sm">Place a Bid</a>
                           <div class="share-area">
                              <ul class="social-icons d-flex">
                                 <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                 <li><a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                 <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest"></i></a></li>
                                 <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                              </ul>
                              <div>
                                 <a href="#" class="share-btn"><i class="bx bxs-share-alt"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-10 ">
                  <div data-wow-duration="1.5s" data-wow-delay="0.4s" class="eg-card auction-card1 wow fadeInDown">
                     <div class="auction-img">
                        <img alt="image" src="{{asset('front_assets/images/sub-1.jpg') }}">
                        <div class="auction-timer">
                           <div class="countdown" id="timer2">
                              <h4><span id="hours2">05</span>H : <span id="minutes2">52</span>M : <span id="seconds2">32</span>S</h4>
                           </div>
                        </div>
                     </div>
                     <div class="auction-content">
                        <h4><a href="user-auction-details.html">Lorem Ipsum is simply dummy text of the printing</a></h4>
                        <p>Bidding Price : <span>$85.9</span></p>
                        <div class="auction-card-bttm">
                           <a href="user-auction-details.html" class="eg-btn btn--primary btn--sm">Place a Bid</a>
                           <div class="share-area">
                              <ul class="social-icons d-flex">
                                 <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                 <li><a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                 <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest"></i></a></li>
                                 <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                              </ul>
                              <div>
                                 <a href="#" class="share-btn"><i class="bx bxs-share-alt"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-10 ">
                  <div data-wow-duration="1.5s" data-wow-delay="0.6s" class="eg-card auction-card1 wow fadeInDown">
                     <div class="auction-img">
                        <img alt="image" src="{{asset('front_assets/images/bg/live-auc3.png') }}">
                        <div class="auction-timer">
                           <div class="countdown" id="timer3">
                              <h4><span id="hours3">05</span>H : <span id="minutes3">52</span>M : <span id="seconds3">32</span>S</h4>
                           </div>
                        </div>
                     </div>
                     <div class="auction-content">
                        <h4><a href="user-auction-details.html">Lorem Ipsum is simply dummy text of the printing</a></h4>
                        <p>Bidding Price : <span>$85.9</span></p>
                        <div class="auction-card-bttm">
                           <a href="user-auction-details.html" class="eg-btn btn--primary btn--sm">Place a Bid</a>
                           <div class="share-area">
                              <ul class="social-icons d-flex">
                                 <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                 <li><a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                 <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest"></i></a></li>
                                 <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                              </ul>
                              <div>
                                 <a href="#" class="share-btn"><i class="bx bxs-share-alt"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-10 ">
                  <div data-wow-duration="1.5s" data-wow-delay="0.2s" class="eg-card auction-card1 wow fadeInDown">
                     <div class="auction-img">
                        <img alt="image" src="{{asset('front_assets/images/bike-1.jpg') }}">
                        <div class="auction-timer">
                           <div class="countdown" id="timer1">
                              <h4><span id="hours1">05</span>H : <span id="minutes1">52</span>M : <span id="seconds1">32</span>S</h4>
                           </div>
                        </div>
                     </div>
                     <div class="auction-content">
                        <h4><a href="user-auction-details.html">Lorem Ipsum is simply dummy text of the printing</a></h4>
                        <p>Bidding Price : <span>$85.9</span></p>
                        <div class="auction-card-bttm">
                           <a href="user-auction-details.html" class="eg-btn btn--primary btn--sm">Place a Bid</a>
                           <div class="share-area">
                              <ul class="social-icons d-flex">
                                 <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                 <li><a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                 <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest"></i></a></li>
                                 <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                              </ul>
                              <div>
                                 <a href="#" class="share-btn"><i class="bx bxs-share-alt"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-10 ">
                  <div data-wow-duration="1.5s" data-wow-delay="0.4s" class="eg-card auction-card1 wow fadeInDown">
                     <div class="auction-img">
                        <img alt="image" src="{{asset('front_assets/images/sub-1.jpg') }}">
                        <div class="auction-timer">
                           <div class="countdown" id="timer2">
                              <h4><span id="hours2">05</span>H : <span id="minutes2">52</span>M : <span id="seconds2">32</span>S</h4>
                           </div>
                        </div>
                     </div>
                     <div class="auction-content">
                        <h4><a href="user-auction-details.html">Lorem Ipsum is simply dummy text of the printing</a></h4>
                        <p>Bidding Price : <span>$85.9</span></p>
                        <div class="auction-card-bttm">
                           <a href="user-auction-details.html" class="eg-btn btn--primary btn--sm">Place a Bid</a>
                           <div class="share-area">
                              <ul class="social-icons d-flex">
                                 <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                 <li><a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                 <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest"></i></a></li>
                                 <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                              </ul>
                              <div>
                                 <a href="#" class="share-btn"><i class="bx bxs-share-alt"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-10 ">
                  <div data-wow-duration="1.5s" data-wow-delay="0.6s" class="eg-card auction-card1 wow fadeInDown">
                     <div class="auction-img">
                        <img alt="image" src="{{asset('front_assets/images/bg/live-auc3.png') }}">
                        <div class="auction-timer">
                           <div class="countdown" id="timer3">
                              <h4><span id="hours3">05</span>H : <span id="minutes3">52</span>M : <span id="seconds3">32</span>S</h4>
                           </div>
                        </div>
                     </div>
                     <div class="auction-content">
                        <h4><a href="user-auction-details.html">Lorem Ipsum is simply dummy text of the printing</a></h4>
                        <p>Bidding Price : <span>$85.9</span></p>
                        <div class="auction-card-bttm">
                           <a href="user-auction-details.html" class="eg-btn btn--primary btn--sm">Place a Bid</a>
                           <div class="share-area">
                              <ul class="social-icons d-flex">
                                 <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                 <li><a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                 <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest"></i></a></li>
                                 <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                              </ul>
                              <div>
                                 <a href="#" class="share-btn"><i class="bx bxs-share-alt"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
@endsection
