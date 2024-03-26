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
                              <h3>Withdraw History</h3>
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
      </div>

@endsection
