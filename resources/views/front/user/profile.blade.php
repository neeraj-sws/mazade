@extends('layouts.front')
@section('page-css-script')
<link rel="stylesheet" href="{{asset('front_assets/css/profile.css') }}">
@endsection

@section('content')
<div class="inner-banner">
         <div class="container">
            <h2 class="inner-banner-title  wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s">Profile</h2>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profile</li>
               </ol>
            </nav>
         </div>
      </div>

      <div class="container bootstrap snippets bootdey pb-5">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="{{asset('front_assets/images/dummy-profile.png') }}" alt="">
              </a>
              <h1>Lorem Ipsum</h1>
              <p>lorem@theEmail.com</p>
              <p><a href="{{ route('dashboard') }}">Dashboard</a></p>
          </div>
      </div>
  </div>
  <div class="profile-info col-md-9">
      <div class="panel">
          <div class="panel-body bio-graph-info">
              <div class="bio-main-3434">
              <h1>Bio Graph</h1>
               </div>
              <div class="row">
                  <div class="bio-row">
                      <p><span>First Name </span>: Lorem</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Last Name </span>: Ipsum</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: loremh@theeamil.com</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Phone </span>: 88 (02) 123456</p>
                  </div>
              </div>
          </div>
      </div>




  <div class="row">
    <div class="col-md-12 course-details-content">
      <div class="course-details-card mt--40">
        <div class="course-content">
          <div class="comment-wrapper">
            <div class="section-title">
              <div class="bio-main-3434">
              <h1>Reviews</h1>
               </div>
            </div>
           <!--  Comment Box start--->
            <div class="edu-comment">
              <div class="thumbnail"> <img src="{{asset('front_assets/images/dummy-profile.png') }}" alt="Comment Images"> </div>
              <div class="comment-content">
                <div class="comment-top">
                  <h6 class="title">Awesome product! Like it</h6>
                  <div class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> </div>
                  <div class="profile-details-2">
               <div class="social-icons">
                   <a href="#" class="icon facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                   <a href="#" class="icon twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                   <a href="#" class="icon instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                 </div>
             </div>
                </div>
                <span class="subtitle">“ Outstanding Review ”</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
           <!-- Comment Box end--->
           <!--  Comment Box start--->
           <div class="edu-comment">
              <div class="thumbnail"> <img src="{{asset('front_assets/images/dummy-profile.png') }}" alt="Comment Images"> </div>
              <div class="comment-content">
                <div class="comment-top">
                  <h6 class="title">Love to connect with you</h6>
                  <div class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> </div>
                  <div class="profile-details-2">
               <div class="social-icons">
                   <a href="#" class="icon facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                   <a href="#" class="icon twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                   <a href="#" class="icon instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                 </div>
             </div>

                </div>
                <span class="subtitle">“ Nice Review ”</span>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
              </div>
            </div>
           <!--  Comment Box end--->
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</div>

@endsection
