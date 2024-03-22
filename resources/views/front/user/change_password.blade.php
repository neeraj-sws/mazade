@extends('layouts.front')


@section('content')
<div class="inner-banner">
         <div class="container">
            <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Dashboard</h2>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
               </ol>
            </nav>
         </div>
      </div>
      <div class="dashboard-section pt-25 pb-40">
         <img alt="image" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
         <img alt="image" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
         <div class="container">
            <div class="row g-4 dash-main-row-1">
           
               @include("front.user.user_profile_sidebar")
             
               <div class="col-lg-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    


                     <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                     <div class="dashboard-password">
                     <div class="bio-main-3434 px-2 pt-3">
                           <h1>Change Password</h1>
                        </div>
                           
                           <div class="form-wrapper">
                              <form class="row g-3" action="{{ route('change.password') }}" method="POST" onsubmit="event.preventDefault();profilte_update(this);return false;" enctype="multipart/form-data">
                                 <div class="row">

                                    <input type="hidden"  name="user_id" value="{{ $user->id }}">

                                    <div class="col-12">
                                       <div class="form-inner">
                                          <label>Old Password *</label>
                                          <input type="password" name="oldpassword" id="password" placeholder="Create A Password" />
                                          <i class="bi bi-eye-slash" id="togglePassword"></i>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-inner mb-0">
                                          <label>New Password *</label>
                                          <input type="password" name="newpassword" id="password2" placeholder="Create A Password" />
                                          <i class="bi bi-eye-slash" id="togglePassword2"></i>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="button-group">
                                          <button type="submit" class="eg-btn profile-btn">Change Password </button>
                                          <button class="eg-btn cancel-btn">Cancel</button>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>

                   


                     </div>
                  </div>
               </div>
            </div>
         </div>
      


@endsection
