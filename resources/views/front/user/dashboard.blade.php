@extends('layouts.front')


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
   @include("front.user.user_profile_sidebar")
  <div class="profile-info col-md-9">
      <div class="panel">
          <div class="panel-body bio-graph-info">
              <div class="bio-main-3434">
              <h1>Bio Graph</h1>
               </div>
              <div class="row">
                  <div class="bio-row">
                      <p><span class="w-100">First Name </span> {{$user->name }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span class="w-100">Last Name </span> {{ $user->last_name }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span class="w-100">Email </span> {{ $user->email }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span class="w-100">Phone </span> {{ $user->mobile_number }}</p>
                  </div>
              </div>
          </div>
      </div>
      @if($user->company)
      <div class="panel">
          <div class="panel-body bio-graph-info">
              <div class="bio-main-3434">
              <h1>Copmany Details</h1>
               </div>
              <div class="row">
                  <div class="bio-row">
                      <p><span class="w-100">Company Name </span> {{ $user->company->company_name }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span class="w-100">Company Phone </span> {{ $user->company->compan_phone }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span class="w-100">Address </span> {{ $user->company->address }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span class="w-100">Commercial Register </span> {{ $user->company->commercial_register }}</p>
                  </div>
              </div>
          </div>
      </div>
      @endif



@if(count($reviews) > 0)
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
        
       

 
           @foreach ($reviews as $review)
            <div class="edu-comment">
              <div class="thumbnail"> <img src="{{asset('front_assets/images/dummy-profile.png') }}" alt="Comment Images"> </div>
              <div class="comment-content">
                <div class="comment-top">
                  <h6 class="title">{{ $review->companyId->company_name}}</h6>
                  <div class="rating">
                     
                     
                        <?php
                        $rating =$review->rating; // You can replace this with the dynamic rating value
                        $filledStars = floor($rating);
                        $unfilledStars = 5 - $filledStars;
                        ?>
                       
                        <?php
                        // Filled stars
                        for ($i = 0; $i < $filledStars; $i++) {
                            echo '<span class="star" style="color: #e6771f;">★</span>';
                        }
                       
                        for ($i = 0; $i < $unfilledStars; $i++) {
                            echo '<span class="star">★</span>';
                        }
                        ?>
                  </div>
                  
                
                  <div class="profile-details-2">
               <div class="social-icons">
                   <a href="#" class="icon facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                   <a href="#" class="icon twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                   <a href="#" class="icon instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                 </div>
             </div>
                </div>
                <span class="subtitle">“ {{ $review->title }} ”</span>
                <p>{{ $review->discription }}</p>
              </div>
            </div>
            @endforeach
           <!-- Comment Box end--->
           <!--  Comment Box start--->
           {{-- <div class="edu-comment">
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
            </div> --}}
           <!--  Comment Box end--->
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  </div>
</div>
</div>

@endsection
