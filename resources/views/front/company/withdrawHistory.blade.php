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

                           <div class="dashboard-area box--shadow">
                              <div class="table-title-area">
                                 <h3>Withdraw History</h3>
                                 {{-- <select>
                                    <option value="01">Show: Last 05 Order</option>
                                    <option value="02">Show: Last 03 Order</option>
                                    <option value="03">Show: Last 15 Order</option>
                                    <option value="04">Show: Last 20 Order</option>
                                 </select> --}}
                              </div>
                              <div class="table-wrapper">
                                 <table class="eg-table order-table table mb-0">
                                    <thead>
                                       <tr>
                                          <th>Buyer</th>
                                          <th>Transaction no</th>
                                          <th>Payment Method</th>
                                          <th>Amount  </th>
                                          <th>Fee</th>
                                          <th>Status</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td data-label="Image"><img class="mr-1" src="{{asset('front_assets/images/bg/pro-pic.png') }}"> John doe</td>
                                          <td data-label="Bidding ID"> 3ZQ3N1BGVYYW</td>
                                          <td data-label="Bid Amount(USD)">Bank Transfer</td>
                                          <td data-label="Bid Amount(USD)">$100</td>
                                          <td data-label="Bid Amount(USD)">$4</td>
                                          <td class="status-code-table" data-label="Bid Amount(USD)">
                                             <p>Pending</p>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td data-label="Image"><img class="mr-1" src="{{asset('front_assets/images/bg/pro-pic.png') }}"> John doe</td>
                                          <td data-label="Bidding ID"> QMUBGYILAKCX</td>
                                          <td data-label="Bid Amount(USD)">Bank Transfer</td>
                                          <td data-label="Bid Amount(USD)">$60</td>
                                          <td data-label="Bid Amount(USD)">$4</td>
                                          <td class="status-price-table" data-label="Bid Amount(USD)">
                                             <p>Rejected</p>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td data-label="Image"><img class="mr-1" src="{{asset('front_assets/images/bg/pro-pic.png') }}"> John doe</td>
                                          <td data-label="Bidding ID"> SIECYMVFCTXM</td>
                                          <td data-label="Bid Amount(USD)">Paypal</td>
                                          <td data-label="Bid Amount(USD)">$40</td>
                                          <td data-label="Bid Amount(USD)">$4</td>
                                          <td class="status-done-table" data-label="Bid Amount(USD)">
                                             <p>Completed</p>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td data-label="Image"><img class="mr-1" src="{{asset('front_assets/images/bg/pro-pic.png') }}"> John doe</td>
                                          <td data-label="Bidding ID"> 2SIDRHMYJLFM</td>
                                          <td data-label="Bid Amount(USD)">Bank Transfer</td>
                                          <td data-label="Bid Amount(USD)">$200</td>
                                          <td data-label="Bid Amount(USD)">$4</td>
                                          <td class="status-done-table" data-label="Bid Amount(USD)">
                                             <p>Completed</p>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="popup2" class="popup">
         <div class="popup-content">
            <div class="row all-form-data">
               <form>
                  <div class="row">
                     <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                           Category : Real estate
                        </div>
                     </div>
                     <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                           Price : $500
                        </div>
                     </div>
                     <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                           Date : 24-04-204
                        </div>
                     </div>
                     <div class="col-md-12 mb-3">
                        <input type="checkcode" id="checkcode" placeholder="Check Code" name="checkcode">
                     </div>
                     <div class="col-md-3 mb-3">
                        <input class="company-popup-btn" type="submit" value="Accept">
                     </div>
                     <div class="col-md-9 mb-3">
                        <a class="close" id="closeBtn2">Close</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
@endsection
