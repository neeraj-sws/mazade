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
      <div class="dashboard-section pt-120 pb-40">
         <img alt="image" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
         <img alt="image" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
         <div class="container">
            <div class="row g-4 dash-main-row-1">
            <div class="col-lg-3">
               @include("front.user.user_profile_sidebar")
               </div>
               <div class="col-lg-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    
                        <div class="dashboard-profile">
                           <div class="owner">
                              <div class="image">
                                 <img alt="image" src="{{asset('front_assets/images/bg/pro-pic.png') }}">
                              </div>
                              <div class="content">
                                 <h3>{{ $user->name }}</h3> 
                                 <p class="para"> {{ $user->name }}</p>
                              </div>
                           </div>
                           <div class="form-wrapper">
                              <form class="row g-3" action="{{ route('companyinfo.update') }}" method="POST" onsubmit="event.preventDefault();profilte_update(this);return false;" enctype="multipart/form-data">
                                 <div class="row">

                                    <input type="hidden"  name="user_id" value="{{ $user->id }}">

                                    <input type="hidden"  name="company_id" value="{{ $company->id }}">

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

                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                        <div class="form-inner">
                                           <label>Company Name *</label>
                                           <input type="text" placeholder="Your first name" name="companyName" value="{{ $company->companyname }}">
                                        </div>
                                     </div>

                                     <div class="col-xl-6 col-lg-12 col-md-6">
                                        <div class="form-inner">
                                           <label>Contact Number 2</label>
                                           <input type="text" placeholder="+8801" name="company_phone" value="{{ $company->companphone }}">
                                        </div>
                                     </div>
                                    

                                    <div class="col-12">
                                       <div class="form-inner">
                                          <label>Address</label>
                                          <input type="text" name="message"  value="{{ $company->address }}">
                                       </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-inner">
                                           <label>Commercial Register</label>
                                           <input type="text" name="commercialRegister"  value="{{ $company->commercialregister }}">
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
