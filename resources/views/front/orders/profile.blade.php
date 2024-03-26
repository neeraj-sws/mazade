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
      <div class="dashboard-section pt-120 pb-120">
         <img alt="image" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
         <img alt="image" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
         <div class="container">
            <div class="row g-4 dash-main-row-1">
               <div class="col-lg-3">
                   @include("front.company.company_profile_sidebar")
               </div>
               <div class="col-lg-9">
                  <div class="tab-content" id="v-pills-tabContent">

                     <!-- Main-Dashboard -->
                     @php 
                      @$photo = Auth::user()->company->photo->file;
                     @endphp

                     <div class="tab-pane fade active show" id="v-pills-last-order-2" role="tabpanel" aria-labelledby="v-pills-last-order-2">
                        <div class="dashboard-profile">
                           <div class="owner">
                              <div class="image">
                                 <img alt="image" src="{{asset('/uploads/company_profile/'.$photo ) }}">
                              </div>
                              <div class="content">
                                 <h3>{{ $user->company->company_name }}</h3>
                                 <p class="para">Slogan</p>
                              </div>
                           </div>
                           <div class="form-wrapper">
                              {{-- <form action="#"> --}}
                              <form class="row g-3" action="{{ route('companyinfo.update') }}" method="POST" onsubmit="event.preventDefault();profile_update(this);return false;" enctype="multipart/form-data">
                                    <div class="row">
                                      {{-- @php echo '<pre>'; print_r($user->id); die; @endphp --}}
                                       <input type="hidden"  name="user_id" value="{{ $user->id }}">
                                 <div class="row">
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Frist Name *</label>
                                          <input type="text" placeholder="Your first name" name="name" value=" {{ $user->name }} ">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Last Name *</label>
                                          <input type="text" placeholder="Your last name" name="lastname" value=" {{ $user->last_name }} ">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Contact Number</label>
                                          <input type="text" placeholder="+8801" name="phone" value=" {{ $user->mobile_number }} ">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Email</label>
                                          <input type="text" placeholder="Your Email" name="email" value=" {{ $user->email }} ">
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-inner">
                                          <label>Address</label>
                                          <input type="text" name="message" value="{{ $user->company->address }}">
                                       </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                       <div class="col-md-10">
                                           <label for="Outletname" class="form-label">Image</label>
                                           <div class="custom-file">
                                               <input type="hidden" name="image_path" value="uploads/company_profile/">
                                               <input type="hidden" name="image_name" value="image">
                                               <input type="file" class="custom-file form-control" name="image"
                                                   onchange="upload_image($(form),'{{ route('imageuplode') }}','image','image');return false;"
                                                   accept=".jpg,.jpeg,.png">
                                               <input type="hidden" name="image" id="image" value="">
                                               <i class="image_loader fa-btn-loader fa fa-refresh fa-spin fa-1x fa-fw"
                                                   style="display:none;"></i>
                                               <label id="lblErrorMessageBannerImage" style="color:red"></label>
                                           </div>
                                       </div>
                                       <div class="col-md-2 mt-3">
                                           <img src="" id="image_prev" class="img-thumbnail " alt="" width="100" height="100"
                                               style="display:none">
                                           <label id="lblErrorMessageBannerImage" style="color:red"></label>
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
                                          <input type="text" placeholder="00000" value="">
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
                                       <div class="form-inner">
                                          <label>Password *</label>
                                          <input type="password" name="password" id="password" placeholder="Create A Password" value=""/>
                                          <i class="bi bi-eye-slash" id="togglePassword"></i>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-inner mb-0">
                                          <label>Confirm Password *</label>
                                          <input type="password" name="password_confirmation" id="password2" placeholder="Create A Password" value=""/>
                                          <i class="bi bi-eye-slash" id="togglePassword2"></i>
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
      </div>

@endsection
