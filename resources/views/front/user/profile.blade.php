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
              <h1>{{ Auth::user()->name }} {{ Auth::user()->lname }}</h1>
              <p>{{ Auth::user()->email }}</p>
             
          </div>
      </div>
      <div class="mt-4 nav flex-column nav-pills gap-4 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a href="{{ route('dashboard') }}" class="nav-link  nav-btn-style mx-auto  mb-20" id="v-pills-dashboard-tab"  type="button" >
           <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_388_603)">
                 <path d="M8.47911 7.33339H1.60411C0.719559 7.33339 0 6.61383 0 5.72911V1.60411C0 0.719559 0.719559 0 1.60411 0H8.47911C9.36383 0 10.0834 0.719559 10.0834 1.60411V5.72911C10.0834 6.61383 9.36383 7.33339 8.47911 7.33339ZM1.60411 1.375C1.47772 1.375 1.375 1.47772 1.375 1.60411V5.72911C1.375 5.85567 1.47772 5.95839 1.60411 5.95839H8.47911C8.60567 5.95839 8.70839 5.85567 8.70839 5.72911V1.60411C8.70839 1.47772 8.60567 1.375 8.47911 1.375H1.60411Z" />
                 <path d="M8.47911 22H1.60411C0.719559 22 0 21.2805 0 20.3959V10.7709C0 9.88618 0.719559 9.16663 1.60411 9.16663H8.47911C9.36383 9.16663 10.0834 9.88618 10.0834 10.7709V20.3959C10.0834 21.2805 9.36383 22 8.47911 22ZM1.60411 10.5416C1.47772 10.5416 1.375 10.6443 1.375 10.7709V20.3959C1.375 20.5223 1.47772 20.625 1.60411 20.625H8.47911C8.60567 20.625 8.70839 20.5223 8.70839 20.3959V10.7709C8.70839 10.6443 8.60567 10.5416 8.47911 10.5416H1.60411Z" />
                 <path d="M20.3953 22H13.5203C12.6356 22 11.916 21.2805 11.916 20.3959V16.2709C11.916 15.3862 12.6356 14.6667 13.5203 14.6667H20.3953C21.2798 14.6667 21.9994 15.3862 21.9994 16.2709V20.3959C21.9994 21.2805 21.2798 22 20.3953 22ZM13.5203 16.0417C13.3937 16.0417 13.291 16.1444 13.291 16.2709V20.3959C13.291 20.5223 13.3937 20.625 13.5203 20.625H20.3953C20.5217 20.625 20.6244 20.5223 20.6244 20.3959V16.2709C20.6244 16.1444 20.5217 16.0417 20.3953 16.0417H13.5203Z" />
                 <path d="M20.3953 12.8334H13.5203C12.6356 12.8334 11.916 12.1138 11.916 11.2291V1.60411C11.916 0.719559 12.6356 0 13.5203 0H20.3953C21.2798 0 21.9994 0.719559 21.9994 1.60411V11.2291C21.9994 12.1138 21.2798 12.8334 20.3953 12.8334ZM13.5203 1.375C13.3937 1.375 13.291 1.47772 13.291 1.60411V11.2291C13.291 11.3557 13.3937 11.4584 13.5203 11.4584H20.3953C20.5217 11.4584 20.6244 11.3557 20.6244 11.2291V1.60411C20.6244 1.47772 20.5217 1.375 20.3953 1.375H13.5203Z" />
              </g>
              <defs>
                 <clipPath id="clip0_388_603">
                    <rect width="22" height="22" fill="white"/>
                 </clipPath>
              </defs>
           </svg>
           Current Auctions 
      </a>
      <a href="{{ route('last-bidings') }}" class="nav-link nav-btn-style mx-auto mb-20" id="v-pills-order-tab"  type="button" >
           <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.7115 18.1422L18.729 5.7622C18.6678 4.96461 17.9932 4.3398 17.1933 4.3398H15.2527V4.25257C15.2527 1.90768 13.345 0 11.0002 0C8.65527 0 6.74758 1.90768 6.74758 4.25257V4.3398H4.80703C4.00708 4.3398 3.33251 4.96457 3.2715 5.76052L2.28872 18.1439C2.21266 19.1354 2.55663 20.1225 3.23235 20.852C3.90808 21.5815 4.86598 22 5.86041 22H16.1399C17.1342 22 18.0922 21.5816 18.768 20.852C19.4437 20.1224 19.7876 19.1354 19.7115 18.1422ZM8.03622 4.25257C8.03622 2.61826 9.36588 1.28863 11.0002 1.28863C12.6344 1.28863 13.9641 2.6183 13.9641 4.25257V4.3398H8.03622V4.25257ZM17.8225 19.9764C17.3835 20.4503 16.7859 20.7114 16.1399 20.7114H5.86045C5.21437 20.7114 4.61685 20.4503 4.17779 19.9764C3.73878 19.5024 3.5242 18.8866 3.57352 18.2441L4.55622 5.86072C4.56619 5.73044 4.67636 5.62843 4.80703 5.62843H6.74758V7.21548C6.74758 7.57131 7.03607 7.8598 7.3919 7.8598C7.74772 7.8598 8.03622 7.57131 8.03622 7.21548V5.62843H13.9641V7.21548C13.9641 7.57131 14.2526 7.8598 14.6084 7.8598C14.9642 7.8598 15.2527 7.57131 15.2527 7.21548V5.62843H17.1933C17.324 5.62843 17.4341 5.73048 17.4443 5.86244L18.4267 18.2424C18.4762 18.8866 18.2615 19.5024 17.8225 19.9764Z" />
              <path d="M13.9035 10.9263C13.652 10.6746 13.244 10.6746 12.9924 10.9263L10.1154 13.8033L9.00909 12.697C8.75751 12.4454 8.34952 12.4454 8.0979 12.697C7.84627 12.9486 7.84627 13.3566 8.0979 13.6082L9.65977 15.1701C9.78558 15.2959 9.9505 15.3588 10.1153 15.3588C10.2802 15.3588 10.4451 15.2959 10.5709 15.1701L13.9034 11.8375C14.1551 11.5858 14.1551 11.1779 13.9035 10.9263Z" />
           </svg>
           Last Biding List
</a>
<a href="{{ route('dashboard') }}" class="nav-link nav-btn-style mx-auto mb-20" id="v-pills-profile-tab"  type="button" >
           <i class="lar la-user"></i>
           <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.7782 14.2218C17.5801 13.0237 16.1541 12.1368 14.5982 11.5999C16.2646 10.4522 17.3594 8.53136 17.3594 6.35938C17.3594 2.85282 14.5066 0 11 0C7.49345 0 4.64062 2.85282 4.64062 6.35938C4.64062 8.53136 5.73543 10.4522 7.40188 11.5999C5.84598 12.1368 4.41994 13.0237 3.22184 14.2218C1.14421 16.2995 0 19.0618 0 22H1.71875C1.71875 16.8823 5.88229 12.7188 11 12.7188C16.1177 12.7188 20.2812 16.8823 20.2812 22H22C22 19.0618 20.8558 16.2995 18.7782 14.2218ZM11 11C8.44117 11 6.35938 8.91825 6.35938 6.35938C6.35938 3.8005 8.44117 1.71875 11 1.71875C13.5588 1.71875 15.6406 3.8005 15.6406 6.35938C15.6406 8.91825 13.5588 11 11 11Z" />
           </svg>
           Profile
</a>

<a href="{{ route('dashboard') }}" class="nav-link nav-btn-style mx-auto mb-20" id="v-pills-change-password-tab"  type="button" >
           <i class="lar la-user"></i>
           <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.7782 14.2218C17.5801 13.0237 16.1541 12.1368 14.5982 11.5999C16.2646 10.4522 17.3594 8.53136 17.3594 6.35938C17.3594 2.85282 14.5066 0 11 0C7.49345 0 4.64062 2.85282 4.64062 6.35938C4.64062 8.53136 5.73543 10.4522 7.40188 11.5999C5.84598 12.1368 4.41994 13.0237 3.22184 14.2218C1.14421 16.2995 0 19.0618 0 22H1.71875C1.71875 16.8823 5.88229 12.7188 11 12.7188C16.1177 12.7188 20.2812 16.8823 20.2812 22H22C22 19.0618 20.8558 16.2995 18.7782 14.2218ZM11 11C8.44117 11 6.35938 8.91825 6.35938 6.35938C6.35938 3.8005 8.44117 1.71875 11 1.71875C13.5588 1.71875 15.6406 3.8005 15.6406 6.35938C15.6406 8.91825 13.5588 11 11 11Z" />
           </svg>
           Change Password
</a>

        <button class="nav-link nav-btn-style mx-auto" type="button" role="tab">
           <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_382_377)">
                 <path d="M21.7273 10.4732L19.3734 8.81368C18.9473 8.51333 18.3574 8.81866 18.3574 9.34047V12.6595C18.3574 13.1834 18.9485 13.4856 19.3733 13.1863L21.7272 11.5268C22.0916 11.2699 22.0906 10.7294 21.7273 10.4732Z" />
                 <path d="M18.4963 15.1385C18.1882 14.9603 17.7939 15.0655 17.6156 15.3737C16.1016 17.9911 13.2715 19.7482 10.0374 19.7482C5.21356 19.7482 1.28906 15.8237 1.28906 11C1.28906 6.17625 5.21356 2.25171 10.0374 2.25171C13.2736 2.25171 16.1025 4.0105 17.6156 6.62617C17.7938 6.93434 18.1882 7.03949 18.4962 6.86138C18.8043 6.68315 18.9096 6.28887 18.7314 5.98074C16.9902 2.97053 13.738 0.962646 10.0374 0.962646C4.48967 0.962646 0 5.45184 0 11C0 16.5477 4.48919 21.0373 10.0374 21.0373C13.7396 21.0373 16.9909 19.028 18.7315 16.0191C18.9097 15.711 18.8044 15.3168 18.4963 15.1385Z" />
                 <path d="M7.05469 10.3555C6.69873 10.3555 6.41016 10.644 6.41016 11C6.41016 11.356 6.69873 11.6445 7.05469 11.6445H17.0677V10.3555H7.05469Z" />
              </g>
              <defs>
                 <clipPath id="clip0_382_377">
                    <rect width="22" height="22" />
                 </clipPath>
              </defs>
           </svg>
           Logout
        </button>
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
                      <p><span>First Name </span>: {{ Auth::user()->name }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Last Name </span>: {{ Auth::user()->lname }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: {{ Auth::user()->email }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Phone </span>: {{ Auth::user()->phone }}</p>
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
        
       

 
           @foreach ($reviews as $review)
            <div class="edu-comment">
              <div class="thumbnail"> <img src="{{asset('front_assets/images/dummy-profile.png') }}" alt="Comment Images"> </div>
              <div class="comment-content">
                <div class="comment-top">
                  <h6 class="title">{{ $review->title }}</h6>
                  <div class="rating">
                    @for ($i = 0; $i < $review->ratings; $i++)
                     <i class="fa fa-star" aria-hidden="true"></i>
                     @endfor  
                  </div>
                  <div class="profile-details-2">
               <div class="social-icons">
                   <a href="#" class="icon facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                   <a href="#" class="icon twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                   <a href="#" class="icon instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                 </div>
             </div>
                </div>
                <span class="subtitle">“ Outstanding Review ”</span>
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
  </div>
</div>
</div>

@endsection
