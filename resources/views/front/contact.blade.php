@extends('layouts.front')

@section('content')
<div class="inner-banner">
         <div class="container">
            <h2 class="inner-banner-title  wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s">Contact us</h2>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Contact us</li>
               </ol>
            </nav>
         </div>
      </div>

      <div id="about-main">
      <div class="container pb-5">
        <h1 class="contact-title text-center fw-bold pt-5 pb-5">Got Any Questions? <br>Don't Hesitate To Get In Touch.</h1>
        <div class="row mt-5">
          <div class="col-md-6 about-content d-flex flex-column all-form-data">
            <form action="your-server-endpoint" method="POST">
                <div class="form-group">
                   <input type="text" id="name" placeholder="Name" name="name">
                </div>
                <div class="form-group login-main-feild mt-3">
                  <textarea id="message" name="message" rows="4" placeholder="Message" cols="50"></textarea>
                </div>
                <div class="form-group login-btn-new">
                    <button type="submit">Submit</button>
                </div>

              </form>
          </div>
          <div class="col-md-6 about-inner-image">
            <img src="{{asset('front_assets/images/contact/contact-image.jpg') }}">
          </div>
        </div>
      </div>
    </div>
@endsection
