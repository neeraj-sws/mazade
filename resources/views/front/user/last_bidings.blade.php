@extends('layouts.front')


@section('content')
<div class="inner-banner">
         <div class="container">
            <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Order Status</h2>
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
                              <h3>My Order</h3>
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
                                       {{--<th>Time Remaining</th> --}}
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
                                       <td data-label="Bidding ID">{{ @$orders->cominfo->company_name }}</td>
                                       <td data-label="Bid Amount(USD)">{{ @$orders->AuId->budget }}</td>
                                       {{--  <td data-label="Highest Bid">10 : 00 : 00</td> --}}
                                       <td data-label="Status" class="text-green">${{ @$orders->price }}</td>
                                       @if($orders->is_payment == 0 AND $orders->status == 0)
                                       <td class="status-price-table text-nowrap" data-label="Bid Amount(USD)"><p>Pending for price</p>
                                       @elseif($orders->is_payment == 1 AND $orders->status == 0)
                                       <td class="status-price-table text-nowrap" data-label="Bid Amount(USD)"><p>Pending </p>
                                          @if($user->role == 1)
                                          <span class="d-block">code: {{$orders->code}}</span>
                                          @endif
                                       @elseif($orders->status == 2)
                                          <td class="status-price-table text-nowrap" data-label="Bid Amount(USD)"><p>Rejected </p>
                                       @elseif($orders->is_payment == 1 AND $orders->status == 1)
                                       <td class="status-done-table text-nowrap" data-label="Bid Amount(USD)"><p>Completed </p>
                                       @endif
                                       @if($user->role == 1 )
                                          <a href="{{ route('user-company-detail',['id' =>  @$orders->id])}}"><button id="popupBtn" class="mt-2 btn-primary">Seller Info</button></a>
                                          @endif
                                       </td>
                                       <td data-label="Status" class="text-green btn-edit-table">
                                          @if($user->role == 1 AND $orders->is_payment == 0 AND $orders->status == 0)
                                          <a href="{{ route('payment', ['id' => @$orders->id]) }}"><button id="popupBtn" class="company-pay-end-btn text-nowrap">Pay now</button></a>
                                          <button id="popupBtn" class="company-pay-end-btn text-nowrap mt-2"  onclick="cancel_order('{{ route('cancel-request') }}', {{$orders->id}})">Cancel</button>
                                          @elseif($orders->is_payment == 1 AND $orders->status == 0)
                                             @if($user->role == 1)

                                             <button id="openPopup"  onclick="openProfile('{{ route('open_profile') }}', {{$orders->id}})" class="end-btn company-end-btn-3434"><i class="far fa-user"></i></button>
                                             @else
                                             <button id="popupBtn6" onclick="code_enter('{{ route('enter_code') }}', {{$orders->id}})" class="end-btn company-end-btn text-nowrap"><i class="fa-regular fa-pen-to-square"></i> Enter Code</button>
                                          @endif
                                          @elseif( ($user->role == 1) And $orders->is_payment == 1 AND $orders->status == 1 And $orders->is_review == 0 )
                                         <a href="{{ route('add-review',['id' => @$orders->id])}}" class="btn btn-primary text-nowrap">Feedback</a>
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

      <div id="profilepopup" class="popup">
      </div>

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
           
            document.getElementById("codeenter").style.display = "block";        
           $('#codeenter').html(res);
            }
       });
   } 
 
   function openProfile(url,id) {
   
   $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        method: "POST",
     data: {id: id },
        success: function (res) {
        
         document.getElementById("profilepopup").style.display = "block";        
        $('#profilepopup').html(res);
         }
    });
} 


   function cancel_order(url,id) {
   
   $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        method: "POST",
         data: {id: id },
        success: function (res) {
         toastr.success('Request Rejected successfully', 'Success');
         location.reload();
        }
    });
} 

    
</script>
@endsection