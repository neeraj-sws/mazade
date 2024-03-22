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

                     <div class="tab-pane fade active show" id="v-pills-last-order-2" role="tabpanel" aria-labelledby="v-pills-last-order-2">
                        <div class="dashboard-area box--shadow">
                           <div class="table-title-area">
                              <h3>All Orders</h3>
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
                                       <th>Budget</th>
                                       <th>Time Remaining</th>
                                       <th>Last price</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td data-label="Image">1</td>
                                       <td data-label="Bidding ID">Bike</td>
                                       <td data-label="Bid Amount(USD)">$500</td>
                                       <td data-label="Bid Amount(USD)">12/04/2024</td>
                                       <td data-label="Bid Amount(USD)">$500</td>
                                       <td class="status-price-table" data-label="Bid Amount(USD)">
                                          <p>Pending</p>
                                       </td>
                                       <td data-label="Status" class="text-green btn-edit-table"><button id="popupBtn6" class="end-btn company-end-btn"><i class="fa-regular fa-pen-to-square"></i> Enter Code</button></td>
                                    </tr>
                                    <tr>
                                       <td data-label="Image">1</td>
                                       <td data-label="Bidding ID">Bike</td>
                                       <td data-label="Bid Amount(USD)">$500</td>
                                       <td data-label="Bid Amount(USD)">12/04/2024</td>
                                       <td data-label="Bid Amount(USD)">$500</td>
                                       <td class="status-price-table" data-label="Bid Amount(USD)">
                                          <p>Pending</p>
                                       </td>
                                       <td data-label="Status" class="text-green btn-edit-table"><button id="popupBtn7" class="end-btn company-end-btn"><i class="fa-regular fa-pen-to-square"></i> Enter Code</button></td>
                                    </tr>
                                    <tr>
                                       <td data-label="Image">3</td>
                                       <td data-label="Bidding ID">Car</td>
                                       <td data-label="Bid Amount(USD)">$2300</td>
                                       <td data-label="Bid Amount(USD)">18/04/2024</td>
                                       <td data-label="Bid Amount(USD)">$500</td>
                                       <td class="status-done-table" data-label="Bid Amount(USD)">
                                          <p>Completed</p>
                                       </td>
                                       <td data-label="Status" class="text-green btn-edit-table"><button class="end-btn company-end-btn company-end-btn-454545"><i class="fa-solid fa-check"></i></button></td>
                                    </tr>

                                    <tr>
                                       <td data-label="Image">3</td>
                                       <td data-label="Bidding ID">Car</td>
                                       <td data-label="Bid Amount(USD)">$2300</td>
                                       <td data-label="Bid Amount(USD)">18/04/2024</td>
                                       <td data-label="Bid Amount(USD)">$500</td>
                                       <td class="status-done-table" data-label="Bid Amount(USD)">
                                          <p>Completed</p>
                                       </td>
                                       <td data-label="Status" class="text-green btn-edit-table"><button class="end-btn company-end-btn company-end-btn-454545"><i class="fa-solid fa-check"></i></button></td>
                                    </tr>

                                    <tr>
                                       <td data-label="Image">3</td>
                                       <td data-label="Bidding ID">Car</td>
                                       <td data-label="Bid Amount(USD)">$2300</td>
                                       <td data-label="Bid Amount(USD)">18/04/2024</td>
                                       <td data-label="Bid Amount(USD)">$500</td>
                                       <td class="status-done-table" data-label="Bid Amount(USD)">
                                          <p>Completed</p>
                                       </td>
                                       <td data-label="Status" class="text-green btn-edit-table"><button class="end-btn company-end-btn company-end-btn-454545"><i class="fa-solid fa-check"></i></button></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>


                     <!-- Profile -->

                     
                     <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="dashboard-profile">
                           <div class="owner">
                              <div class="image">
                                 <img alt="image" src="{{asset('front_assets/images/bg/pro-pic.png') }}">
                              </div>
                              <div class="content">
                                 <h3>Company Name</h3>
                                 <p class="para">Slogan</p>
                              </div>
                           </div>
                           <div class="form-wrapper">
                              <form action="#">
                                 <div class="row">
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Frist Name *</label>
                                          <input type="text" placeholder="Your first name">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Last Name *</label>
                                          <input type="text" placeholder="Your last name">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Contact Number</label>
                                          <input type="text" placeholder="+8801">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                       <div class="form-inner">
                                          <label>Email</label>
                                          <input type="text" placeholder="Your Email">
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-inner">
                                          <label>Address</label>
                                          <input type="text" name="message">
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
                                       <div class="form-inner">
                                          <label>Password *</label>
                                          <input type="password" name="password" id="password" placeholder="Create A Password" />
                                          <i class="bi bi-eye-slash" id="togglePassword"></i>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-inner mb-0">
                                          <label>Confirm Password *</label>
                                          <input type="password" name="password" id="password2" placeholder="Create A Password" />
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
