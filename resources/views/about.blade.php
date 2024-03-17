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

      <div id="about-main" class="py-5">
      <div class="container">
        <div class="row mt-3">
          <div class="col-md-6 about-main-img">
            <img src="images/about-image-2.png">
          </div>
          <div class="col-md-6 about-content d-flex justify-content-center flex-column">
            <h5 class="">About</h5>
            <h2 class="">Lorem Ipsum is simply dummy text <br>of the <span class="color-diff"> printing</span></h2>
            <p class="text-16 color-p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer tookLorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took.
            </p>
            <a href="#"><button type="button" class="btn register-btn text-16">
             Read more
          </button></a>
          </div>
          
        </div>
      </div>
    </div>
@endsection
