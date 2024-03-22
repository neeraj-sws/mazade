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
                    
                        <div class="dashboard-profile">
                        <div class="bio-main-3434 px-2 pt-3">
                           <h1>Edit Profile Details</h1>
                        </div>
                          
                           <div class="form-wrapper">
                              <form class="row g-3" action="{{ route('user.update') }}" method="POST" onsubmit="event.preventDefault();profilte_update(this);return false;" enctype="multipart/form-data">
                                 <div class="row">

                                    <input type="hidden"  name="user_id" value="{{ $user->id }}">

                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Frist Name *</label>
                                          <input type="text" placeholder="Your first name" name="name" value="{{ $user->name }}">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Last Name *</label>
                                          <input type="text" placeholder="Your last name" name="lastname" value="{{ $user->last_name }}">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Contact Number</label>
                                          <input type="text" placeholder="+8801" name="phone" value="{{ $user->mobile_number }}">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Email</label>
                                          <input type="text" placeholder="Your Email" name="email" value="{{ $user->email }}">
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-inner">
                                          <label>Address</label>
                                          <input type="text" name="message"  value="{{ $user->address }}">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>City</label>
                                          <select id="city">
                                             <option>Dhaka</option>
                                             <option>Sylhet</option>
                                             <option>Chittagong</option>
                                             <option>Rajshahi</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>State</label>
                                          <select name="state" id="state">
                                             <option>Dhaka</option>
                                             <option>Sylhet</option>
                                             <option>Chittagong</option>
                                             <option>Rajshahi</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Zip Code</label>
                                          <input type="text" placeholder="00000">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Country</label>
                                          <select>
                                             <option>Bangladesh</option>
                                             <option>Afganistan</option>
                                             <option>India</option>
                                             <option>China</option>
                                          </select>
                                       </div>
                                    </div>
                                   
                                    <div class="col-12">
                                       <div class="button-group">
                                          <button type="submit" class="eg-btn profile-btn">Update Profile</button>
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
      


@endsection
