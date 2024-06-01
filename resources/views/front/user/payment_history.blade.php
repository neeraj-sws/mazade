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
                              <h3>Payment History</h3>
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
                                       <th>ID order</th>
                                       <th>Auction Name</th>
                                       <th>Category Name</th>
                                       <th>Seller Name</th>
                                       <th>Budget</th>
                                       <th>Last price</th>
                                       <th>Payment ID</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>

                                 <?php
                                    //  echo '<pre>'; print_r($auctionitem); die;
                                      ?>
                                    @foreach ($transactions as $transaction)
                                    {{-- @php 
                                       echo "<pre>"; print_r($transaction->order->Auction->companyId->user->name); die;
                                    @endphp --}}
                                    <tr>
                                     
                                       <td data-label="Image">{{ $transaction->order->order_id}}</td>
                                       <td data-label="Image">
                                          <a href="javascript:void(0);" class="text-primary text-decoration-underline" onclick="auction_detail('{{ route('viewAuction', $transaction->order->AuId->id) }}', '{{ $transaction->order->AuId->id }}');">{{ $transaction->order->AuId->title }}</a>
                                       </td>
                                       <td data-label="Bidding ID">{{ @$transaction->order->CatId->title }}</td>
                                       <td data-label="Bidding ID">{{ @$transaction->order->Auction->companyId->user->name }}</td>
                                       <td data-label="Bid Amount(USD)">{{ @$transaction->order->AuId->budget }}</td>
                                       <td data-label="Highest Bid">{{ @$transaction->order->price}}</td>
                                       <td data-label="transaction ID">{{ @$transaction->transaction_id}}</td>
                                       <td data-label="Highest Bid">
                                          @if(!empty($transaction->transaction_detail))
                                          @php
                                        $transaction_details = json_decode($transaction->transaction_detail);
                                          if($transaction_details->payment_result->response_status == "A")
                                          {
                                             echo '<span class="text-success"> Success </span>';
                                          }else{
                                             echo '<span class="text-danger"> Failed </span>';
                                          }
                                          @endphp
                                          @endif
                                       </td>
                                      <td data-label="Status" class="text-green">
                                       @if(!empty($transaction->transaction_detail))
                                       @php
                                       $transaction_details = json_decode($transaction->transaction_detail);
                                       echo  $transaction_details->payment_result->response_message;
                                       @endphp
                                       @endif
                                      </td>
                                    </tr>
            
                                    @endforeach
                                 
                              
                                 </tbody>
                              </table>
                           </div>
                           {!! $transactions->withQueryString()->links('pagination::bootstrap-5') !!}
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

function auction_detail(url, id, modal = 'modal-lg') {
    
    $('#modal-default .modal-content').html('');
    url = url.replace(':id', id);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: url,
      method: "GET",
      data: {},
      success: function (res) {
        $('#' + modal + ' .modal-content').html(res);
        $('#' + modal).modal('show');
      }
    });
  }

    
</script>
@endsection