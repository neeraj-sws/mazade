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
                    
                     <div class="tab-pane fade show active" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab">
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
                                    @foreach ($orders as $orders)
                                    
                                    <tr>
                                     
                                       <td data-label="Image">{{ $orders->AuId->oder_id }}</td>
                                       <td data-label="Bidding ID">{{ @$orders->CatId->title }}</td>
                                       <td data-label="Bidding ID">{{ @$orders->comid->name }}</td>
                                       <td data-label="Bid Amount(USD)">{{ @$orders->AuId->budget }}</td>
                                       <td data-label="Highest Bid">10 : 00 : 00</td>
                                       <td data-label="Status" class="text-green">${{ @$orders->price }}</td>
                                       <td class="status-price-table text-nowrap" data-label="Bid Amount(USD)"><p>Pending  @if($orders->is_payment == 0)for price @endif</p>
                                          <a href="{{ route('user-company-detail',['id' =>  @$orders->id])}}"><button id="popupBtn" class="mt-2 btn-primary">Company Info</button></a>
                                          <a href="{{ route('add-review',['id' => @$orders->id])}}"><button id="popupBtn" class="mt-2 btn-primary">Review</button></a>
                                       </td>
                                       <td data-label="Status" class="text-green btn-edit-table">
                                          @if($orders->is_payment == 0)
                                          <a href="{{ route('payment', ['id' => @$orders->id]) }}"><button id="popupBtn" class="company-pay-end-btn text-nowrap">Pay now</button></a>
                                          <a href="payment.html"><button id="popupBtn" class="company-pay-end-btn text-nowrap mt-2">Cancel</button></a>
                                          @else
                                          <button id="popupBtn6" onclick="code_enter('{{ route('enter_code') }}', {{$orders->id}})" class="end-btn company-end-btn text-nowrap" oncli><i class="fa-regular fa-pen-to-square"></i> Enter Code</button>
                                          @endif
                                       </td> 
                                    </tr>
            
                                    @endforeach
                                 
                              
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

      <div id="codeenter" class="popup">
         
      </div>
@endsection
<script>


function code_enter(url,id) {
   
 
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url: url,
           method: "POST",
        data: {id: id },
           success: function (res) {
            console.log(res);
            document.getElementById("codeenter").style.display = "block";        
           $('#codeenter').html(res);
            }
       });
   } 
 

    
</script>