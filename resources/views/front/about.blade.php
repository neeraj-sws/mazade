@extends('layouts.front')

@section('content')
<div class="inner-banner" style="background-image: url({{asset('uploads/about/'.$about->headerImage->file)}})!important;">
         <div class="container">
            <h2 class="inner-banner-title  wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s">Auction Details</h2>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Auction Details</li>
               </ol>
            </nav>
         </div>
      </div>

    <div id="about-main" class="py-5">
      <div class="container">
        <div class="row mt-3">
          <div class="col-md-6 about-main-img">
          <img src="{{asset('uploads/about/'.$about->photo->file)}}">
          </div>
          <div class="col-md-6 about-content d-flex justify-content-center flex-column">
            <h5 class="">About</h5>
            <h2 class="">{{ $about->title }}</span></h2>
            <p class="text-16 color-p">
                  {{ $about->description }}
                  </p>
            <a href="#"><button type="button" class="btn register-btn text-16">
             Read more
          </button></a>
          </div>
          
        </div>
      </div>
    </div>
@endsection
