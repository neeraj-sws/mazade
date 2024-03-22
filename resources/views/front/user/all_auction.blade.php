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
                     <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                        <div class="dashboard-area box--shadow pb-80">
               <div class="table-title-area">
                  <h3>All Auctions </h3>
                     <a class="new-auction-btn-main" href="{{ route('new-auction') }}"><button>Start new auction</button></a>
               </div>
               <div class="table-wrapper">
                  <table class="eg-table order-table table mb-0">
                     <thead>
                        <tr>
                           <th>ID Order</th>
                           <th>Title</th>
                           <th>Category</th>
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
                        @php
                      
                        $endDateTime = \Carbon\Carbon::parse($auctions->end_time);
                        $now = \Carbon\Carbon::now();
                        $timeDifference = $now->diff($endDateTime);
                           $days = $timeDifference->d;
                           $hours = $timeDifference->h;
                           $minutes = $timeDifference->i;
                           $seconds = $timeDifference->s;
                           $timeDifferenceString = $timeDifference->format('%d days, %h hours, %i minutes, %s seconds');

                        @endphp
                        <tr>
                         
                        
                           <td data-label="Image">{{ $auctions->oder_id }}</td>
                           <td data-label="Title">{{ $auctions->title }}</td>
                           <td data-label="Category">{{ $auctions->CatId->title }}</td>
                           <td data-label="Bid Amount(USD)">${{ $auctions->budget }}</td>
                           <td data-label="Highest Bid">{{ $timeDifferenceString; }}</td>
                           <td data-label="Status" class="text-green">$0.00</td>
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
