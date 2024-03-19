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
                  <div class="nav flex-column nav-pills gap-4 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                     <button class="nav-link active nav-btn-style mx-auto  mb-20" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
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
                     </button>
                     <button class="nav-link nav-btn-style mx-auto mb-20" id="v-pills-order-tab" data-bs-toggle="pill" data-bs-target="#v-pills-order" type="button" role="tab" aria-controls="v-pills-order" aria-selected="true">
                        <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                           <path d="M19.7115 18.1422L18.729 5.7622C18.6678 4.96461 17.9932 4.3398 17.1933 4.3398H15.2527V4.25257C15.2527 1.90768 13.345 0 11.0002 0C8.65527 0 6.74758 1.90768 6.74758 4.25257V4.3398H4.80703C4.00708 4.3398 3.33251 4.96457 3.2715 5.76052L2.28872 18.1439C2.21266 19.1354 2.55663 20.1225 3.23235 20.852C3.90808 21.5815 4.86598 22 5.86041 22H16.1399C17.1342 22 18.0922 21.5816 18.768 20.852C19.4437 20.1224 19.7876 19.1354 19.7115 18.1422ZM8.03622 4.25257C8.03622 2.61826 9.36588 1.28863 11.0002 1.28863C12.6344 1.28863 13.9641 2.6183 13.9641 4.25257V4.3398H8.03622V4.25257ZM17.8225 19.9764C17.3835 20.4503 16.7859 20.7114 16.1399 20.7114H5.86045C5.21437 20.7114 4.61685 20.4503 4.17779 19.9764C3.73878 19.5024 3.5242 18.8866 3.57352 18.2441L4.55622 5.86072C4.56619 5.73044 4.67636 5.62843 4.80703 5.62843H6.74758V7.21548C6.74758 7.57131 7.03607 7.8598 7.3919 7.8598C7.74772 7.8598 8.03622 7.57131 8.03622 7.21548V5.62843H13.9641V7.21548C13.9641 7.57131 14.2526 7.8598 14.6084 7.8598C14.9642 7.8598 15.2527 7.57131 15.2527 7.21548V5.62843H17.1933C17.324 5.62843 17.4341 5.73048 17.4443 5.86244L18.4267 18.2424C18.4762 18.8866 18.2615 19.5024 17.8225 19.9764Z" />
                           <path d="M13.9035 10.9263C13.652 10.6746 13.244 10.6746 12.9924 10.9263L10.1154 13.8033L9.00909 12.697C8.75751 12.4454 8.34952 12.4454 8.0979 12.697C7.84627 12.9486 7.84627 13.3566 8.0979 13.6082L9.65977 15.1701C9.78558 15.2959 9.9505 15.3588 10.1153 15.3588C10.2802 15.3588 10.4451 15.2959 10.5709 15.1701L13.9034 11.8375C14.1551 11.5858 14.1551 11.1779 13.9035 10.9263Z" />
                        </svg>
                        Last Biding List
                     </button>
                     <button class="nav-link nav-btn-style mx-auto mb-20" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                        <i class="lar la-user"></i>
                        <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                           <path d="M18.7782 14.2218C17.5801 13.0237 16.1541 12.1368 14.5982 11.5999C16.2646 10.4522 17.3594 8.53136 17.3594 6.35938C17.3594 2.85282 14.5066 0 11 0C7.49345 0 4.64062 2.85282 4.64062 6.35938C4.64062 8.53136 5.73543 10.4522 7.40188 11.5999C5.84598 12.1368 4.41994 13.0237 3.22184 14.2218C1.14421 16.2995 0 19.0618 0 22H1.71875C1.71875 16.8823 5.88229 12.7188 11 12.7188C16.1177 12.7188 20.2812 16.8823 20.2812 22H22C22 19.0618 20.8558 16.2995 18.7782 14.2218ZM11 11C8.44117 11 6.35938 8.91825 6.35938 6.35938C6.35938 3.8005 8.44117 1.71875 11 1.71875C13.5588 1.71875 15.6406 3.8005 15.6406 6.35938C15.6406 8.91825 13.5588 11 11 11Z" />
                        </svg>
                        Profile
                     </button>

                     <button class="nav-link nav-btn-style mx-auto mb-20" id="v-pills-change-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-change-password" type="button" role="tab" aria-controls="v-pills-change-password" aria-selected="true">
                        <i class="lar la-user"></i>
                        <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                           <path d="M18.7782 14.2218C17.5801 13.0237 16.1541 12.1368 14.5982 11.5999C16.2646 10.4522 17.3594 8.53136 17.3594 6.35938C17.3594 2.85282 14.5066 0 11 0C7.49345 0 4.64062 2.85282 4.64062 6.35938C4.64062 8.53136 5.73543 10.4522 7.40188 11.5999C5.84598 12.1368 4.41994 13.0237 3.22184 14.2218C1.14421 16.2995 0 19.0618 0 22H1.71875C1.71875 16.8823 5.88229 12.7188 11 12.7188C16.1177 12.7188 20.2812 16.8823 20.2812 22H22C22 19.0618 20.8558 16.2995 18.7782 14.2218ZM11 11C8.44117 11 6.35938 8.91825 6.35938 6.35938C6.35938 3.8005 8.44117 1.71875 11 1.71875C13.5588 1.71875 15.6406 3.8005 15.6406 6.35938C15.6406 8.91825 13.5588 11 11 11Z" />
                        </svg>
                        Change Password
                     </button>

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
               <div class="col-lg-9">
                  <div class="tab-content" id="v-pills-tabContent">
                     <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                        <div class="dashboard-area box--shadow pb-80">
               <div class="table-title-area">
                  <h3>Current Auctions </h3>
                     <a class="new-auction-btn-main" href="{{ route('new-auction') }}"><button>Start new auction</button></a>
               </div>
               <div class="table-wrapper">
                  <table class="eg-table order-table table mb-0">
                     <thead>
                        <tr>
                           <th>ID Order</th>
                           <th>Category Name</th>
                           <th>Budget</th>
                           <th class="us-ac-th">Time Left</th>
                           <th>Current Price</th>
                           <th>Seller <br> Profile</th>
                           <th>Cancel</th>
                           <th>End Auction</th>
                        </tr>
                     </thead>
                     <tbody>

                        @foreach ($auction as $auctions)

                        <tr>
                         
                        
                           <td data-label="Image">{{ $auctions->oder_id }}</td>
                           <td data-label="Bidding ID">{{ $auctions->CatId->title }}</td>
                           <td data-label="Bid Amount(USD)">${{ $auctions->budget }}</td>
                           <td data-label="Highest Bid">10 : 00 : 00</td>
                           <td data-label="Status" class="text-green">$90</td>
                           <td data-label="Status" class="text-green"><a href="profile-for-user.html"><i class="far fa-user"></i></a></td>

                           @if ($auctions->status == 2)
                           
                           <td data-label="Action"><a href="javascript:void(0);" ><button class="cancel-btn"><i class="fas fa-times" aria-hidden="true"></i> Cancelled </button></a></td> 
                           @else
                           <td data-label="Action"><a href="javascript:void(0);" class="cancel-btn"  onclick="status_change('{{ route('auction-bit') }}','2', {{ $auctions->id }})"><button class="cancel-btn"><i class="fas fa-times" aria-hidden="true"></i> Cancel</button></a></td> 
                           @endif
                           
                           @if ($auctions->is_start == 1)
                           <td data-label="Status" class="text-green"><a href="javascript:void(0);" class="cancel-btn"  onclick="status_change('{{ route('auction-end') }}','0', {{ $auctions->id }})"><button class="end-btn">End Auction</button></a></td> 
                           @else
                           <td data-label="Status" class="text-green"><a href="javascript:void(0);"><button class="end-btn">End Auction</button></a></td> 
                           @endif

                        </tr>

                        @endforeach
                     </tbody>
                  </table>
               </div>



               <div class="table-pagination">
                  <p>Showing 10 to 20 of 1 entries</p>
                  <nav class="pagination-wrap">
                     <ul class="pagination style-two d-flex justify-content-center gap-md-3 gap-2">
                        <li class="page-item">
                           <a class="page-link" href="#" tabindex="-1">Prev</a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">01</a></li>
                        <li class="page-item">
                           <a class="page-link" href="#">02</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item">
                           <a class="page-link" href="#">Next</a>
                        </li>
                     </ul>
                  </nav>
               </div>


            </div>
                     </div>
                     <div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab">
                        <div class="dashboard-area box--shadow">
                           <div class="table-title-area">
                              <h3>Order Status</h3>
                              <select>
                                 <option value="01">Show: Last 05 Order</option>
                                 <option value="02">Show: Last 03 Order</option>
                                 <option value="03">Show: Last 15 Order</option>
                                 <option value="04">Show: Last 20 Order</option>
                              </select>
                           </div>
                           <div class="table-wrapper">
                              <table class="eg-table order-table table mb-0">
                                 <thead>
                                    <tr>
                                       <th>ID order</th>
                                       <th>Category Name</th>
                                       <th>Seller Name</th>
                                       <th>Budget</th>
                                       <th>Time Remaining</th>
                                       <th>Last price</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>

                                 <?php
                                    //  echo '<pre>'; print_r($auctionitem); die;
                                      ?>
                                    @foreach ($auctionitem as $auctions)
                                     <?php //echo '<pre>'; print_r($auctions->CatId);?>
                                    <tr>
                                     
                                       <td data-label="Image">{{ $auctions->oder_id }}</td>
                                       <td data-label="Bidding ID">{{ @$auctions->CatId->title }}</td>
                                       <td data-label="Bidding ID">{{ @$auctions->companyId->name }}</td>
                                       <td data-label="Bid Amount(USD)">{{ @$auctions->AuId->budget }}</td>
                                       <td data-label="Highest Bid">10 : 00 : 00</td>
                                       <td data-label="Status" class="text-green">${{ @$auctions->price }}</td>
                                       <td class="status-price-table" data-label="Bid Amount(USD)"><p>Pending for price</p></td>
                                       <td data-label="Status" class="text-green btn-edit-table"><a href="payment.html"><button id="popupBtn" class="company-pay-end-btn">Pay now</button></a></td>
                                      

                                    </tr>
            
                                    @endforeach
                                 
                              
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>


                     <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
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

                     <div class="tab-pane fade" id="v-pills-change-password" role="tabpanel" aria-labelledby="v-pills-change-password-tab">
                        <div class="dashboard-password">
                           <div class="owner">
                             
                              <div class="content">
                                 
                                 <h3>{{ $user->name }}</h3> 
                                 <p class="para"> {{ $user->name }}</p>
                              </div>
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


                     <div class="tab-pane fade" id="v-pills-purchase" role="tabpanel" aria-labelledby="v-pills-purchase-tab">
                        <div class="table-title-area">
                           <h3>All Purchase</h3>
                           <select id="order-category">
                              <option value="01">Show: Last 05 Order</option>
                              <option value="02">Show: Last 03 Order</option>
                              <option value="03">Show: Last 15 Order</option>
                              <option value="04">Show: Last 20 Order</option>
                           </select>
                        </div>
                        <div class="table-wrapper">
                           <table class="eg-table order-table table mb-0">
                              <thead>
                                 <tr>
                                    <th>Title</th>
                                    <th>Bidding ID</th>
                                    <th>Bid Amount(USD)</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td data-label="Title">Auction Title 01</td>
                                    <td data-label="Bidding ID">Bidding_HvO253gT</td>
                                    <td data-label="Bid Amount(USD)">1222.8955</td>
                                    <td data-label="Image"><img alt="image" src="{{asset('front_assets/images/bg/order1.png') }}" class="img-fluid"></td>
                                    <td data-label="Status" class="text-green">Successfully</td>
                                    <td data-label="Action"><button class="eg-btn action-btn green"><img alt="image" src="{{asset('front_assets/images/icons/aiction-icon.svg') }}"></button></td>
                                 </tr>
                                 <tr>
                                    <td data-label="Title">Auction Title 02</td>
                                    <td data-label="Bidding ID">Bidding_HvO253gT</td>
                                    <td data-label="Bid Amount(USD)">1222.8955</td>
                                    <td data-label="Image"><img alt="image" src="{{asset('front_assets/images/bg/order2.png') }}"></td>
                                    <td data-label="Status" class="text-green">Successfully</td>
                                    <td data-label="Action"><button class="eg-btn action-btn green"><img alt="image" src="{{asset('front_assets/images/icons/aiction-icon.svg') }}"></button></td>
                                 </tr>
                                 <tr>
                                    <td data-label="Title">Auction Title 03</td>
                                    <td data-label="Bidding ID">Bidding_HvO253gT</td>
                                    <td data-label="Bid Amount(USD)">1222.8955</td>
                                    <td data-label="Image"><img alt="image" src="{{asset('front_assets/images/bg/order3.png') }}"></td>
                                    <td data-label="Status" class="text-green">Cancel</td>
                                    <td data-label="Action"><button class="eg-btn action-btn green"><img alt="image" src="{{asset('front_assets/images/icons/aiction-icon.svg') }}"></button></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="table-pagination">
                           <p>Showing 10 to 20 of 1 entries</p>
                           <nav class="pagination-wrap">
                              <ul class="pagination style-two d-flex justify-content-center gap-md-3 gap-2">
                                 <li class="page-item">
                                    <a class="page-link" href="#" tabindex="-1">Prev</a>
                                 </li>
                                 <li class="page-item"><a class="page-link" href="#">01</a></li>
                                 <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">02</a>
                                 </li>
                                 <li class="page-item"><a class="page-link" href="#">03</a></li>
                                 <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                 </li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div id="popup" class="popup">
        <div class="popup-content popup-content-2">
          <span class="new-close-user" id="closePopup">&times;</span>
          <div class="profile">
             <div class="profile-photo">
               <img src="{{asset('front_assets/images/dummy-profile.png') }}" alt="Profile Photo">
             </div>
             <div class="profile-details">
               <h2>Name: John Doe</h2>
               <p>Profession: Software Engineer</p>
               <div class="review">
                 <span class="stars">★★★★☆</span>
                 <span>4.0</span>
               </div>
             </div>
             <div class="profile-details-2">
               <div class="social-icons">
                   <a href="#" class="icon facebook"><i class="fab fa-facebook-f"></i></a>
                   <a href="#" class="icon twitter"><i class="fab fa-twitter"></i></a>
                   <a href="#" class="icon instagram"><i class="fab fa-instagram"></i></a>
                 </div>

                 <div class="review-main-back-top">
                 <div class="review-main-back">
                     <p><b>Code:</b> 1234 5678</p>
                  </div>
                  </div>





             </div>
           </div>
           <div class="profile-bottom">
              <div class="profile-bottom-boxes">
                 <div class="inner-profile-boxx">
                    <ul class="contact-info">
                 <li><strong>Phone:</strong> +1 234 567 890</li>
                 <li><strong>Location:</strong> New York, USA</li>
                 <li><strong>Email:</strong> john.doe@example.com</li>
               </ul>
                 </div>
                 <div class="inner-profile-boxx-2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52938394.043503165!2d-161.9222531578104!3d35.91997508297218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1710155262056!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                 </div>
              </div>
           </div>
        </div>
      </div>

@endsection
