@extends('layouts.front')
@section('page-css-script')
<link rel="stylesheet" href="{{asset('front_assets/css/profile.css') }}">
@endsection
@section('content')
<div class="inner-banner">
         <div class="container">
            <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s"> {{ $auction->CatId->title }}</h2>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $auction->title }}</li>
               </ol>
            </nav>
         </div>
      </div>


      <div class="signup-section pt-5 pb-5">
         <div class="container">
            <div class="row d-flex justify-content-center">
               <div class="col-xl-9 col-lg-9 col-md-9 box-shad-form">
                  <div class="form-wrapper wow fadeInUp register-top-slider" data-wow-duration="1.5s" data-wow-delay=".2s">
                     
                     <div class="row all-form-data">
                 
                    <div class="row">
                      <div class="col-md-6 mb-3">
                      {{ $auction->title }}
                      </div>
                      <div class="col-md-6 mb-3 d-flex justify-content-end">
                         <div id="countdown_{{ $auction->id }}"></div>
                      </div>
                      <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                        Category : {{ $auction->CatId->title }}
                        </div>
                      </div>
                      <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                           Budget: $<span id="">{{ $auction->budget }}</span>
                        </div>
                      </div>
                      <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                        Last Price : ${{ $auction->latestBid($auction->id)}}
                        </div>
                      </div>
                      @foreach($meta_fields as $fields)
                      <div class="col-md-6 my-4">
                         <div class="detail-box-main">
                            {{ $fields->metaInput->title }} : {{ $fields->meta_value }}
                         </div>
                       </div>
                    @endforeach
                      <div class="col-md-12 my-3">
                         <p>{{ $auction->message }}</p>
                      </div>
                      @if($company->role == 2)
                      <div class="col-md-3 mb-3">
                          <a id="popupBtn" class="end-btn company-end-btn new-bid-btn"></i>Bid</a>
                      </div>
                     @endif
                     @if($company->role == 1)

                     @if(!empty($orders))
                     <div class="col-md-3 mb-3">
                        @if($orders->is_payment == 0 AND $orders->status == 0)
                        <a href="{{ route('payment', $orders->id) }}" id="paybtn" class="end-btn company-end-btn new-bid-btn">Pay Now</a>
                        @elseif($orders->is_payment == 1 AND $orders->status == 0)
                        <span class="d-block">code: {{$orders->code}}</span>
                        @elseif($orders->is_payment == 1 AND $orders->status == 1)
                        <span class="d-block">Completed</span>
                        @endif
                   </div>

                   @else

                   <div class="col-md-3 mb-3">
                     <a href="javascript:void(0)" claSS="btn btn-dark text-nowrap" onclick="end_auctions('{{ route('end-auctions') }}', {{ $auction->id }})">End Auction</a>
                    
                </div>

                   
                   @endif

                     @endif                     
                    </div>
                  
                </div>
                <span id="budget" class="d-none"> @if(empty($auction->last_bid)) {{ $auction->budget }} @else {{ $auction->last_bid }} @endif</span>
                  </div>
               </div>
               @if($company->role == 1)
               <div class="profile-info col-md-9">
      


      

  </div>
  @endif
            </div>
         </div>
      </div>

      @if (Auth::guard('web')->user()->company)
<div id="popup" class="popup">
  <div class="popup-content popup-new-content">
   <form action="{{ route('bidadd') }}" method="post">
      <!-- Form fields here -->
      @csrf

      <div data-mdb-input-init class="form-outline mb-4">
         <input type="hidden" name="auction_id"  value="{{ $auction->id }}" id="form4Example1" class="form-control"  readonly/>
     </div>
      <input type="hidden" name="company_id"  value="{{ Auth::guard('web')->user()->id }}" class="form-control"/>

     <input type="hidden" name="category_id"  value="{{ $auction->category }}" class="form-control"/>
    
   <div class="row">
      
      <div class="col-md-6 mb-4">
         <div class="detail-box-main">
         ID Order : {{ $auction->oder_id }}
          </div>
      </div>
      <div class="col-md-6 mb-4">
      <div class="detail-box-main">
         Category : {{ $auction->CatId->title }}
      </div>
      </div>
      <div class="col-md-12 mb-3 all-form-data mb-4">
         <input type="text" id="Price" placeholder="Price" name="lastPrice" value="">
         <span class="bid_error text-danger small">Bid price should be less than $@if(empty($auction->last_bid)){{ $auction->budget }} @else{{ $auction->last_bid }} @endif</span>
         <p class="price_percentage small">(8% will be deductated from current bid as commission)</p>
        
      </div>
      <div class="col-md-6 pop-btn-main-sec">
         <input id="bidButton" class="company-new-popup-btn" type="submit" value="Bid" disabled>
      </div>

      <div class="col-md-6 pop-btn-main-sec">
             <span class="close close" id="closeBtn">Close</span>
      </div>
      
  </div>
  </form>
</div>
</div>
@endif
@endsection

@section('page-js-script')
<script>
$(document).ready(function() {
   
    $('.bid_error').hide();
    
   
    var budget = parseFloat($('#budget').text());

 
    function handleInput() {
        var priceInput = $('#Price');
        var bidButton = $('#bidButton');
        var price = parseFloat(priceInput.val());

        if (price <= budget && price > 0) {
            $('.bid_error').hide();
            bidButton.prop('disabled', false);
        } else {
            $('.bid_error').show();
            bidButton.prop('disabled', true);
        }
    }

  
    $('#Price').on('input', handleInput);
});



        // Set the target date and time
        var startTime_{{ $auction->id }} =  new Date("{{ $auction->created_at }}").getTime();
        var duration = 24 * 60 * 60 * 1000; // Duration in milliseconds (24 hours)

        var endDateTime_{{ $auction->id }} = startTime_{{ $auction->id }} + duration;
        var countdownElement_{{ $auction->id }} = document.getElementById("countdown_{{ $auction->id }}");

        // Update the countdown every second
        setInterval(function() {
            var now = new Date().getTime();
            var distance = endDateTime_{{ $auction->id }} - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownElement_{{ $auction->id }}.innerHTML = hours + "h " + minutes + "m " + seconds + "s ";

            // If the countdown is over, display 'EXPIRED' or take appropriate action
            if (distance < 0) {
                countdownElement_{{ $auction->id }}.innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>

    <script>
  
      document.getElementById("popupBtn").onclick = function() {
      document.getElementById("popup").style.display = "block";
    }

      document.getElementById("closeBtn").onclick = function() {
      document.getElementById("popup").style.display = "none";
    }

    function confirm_bids(url,id) {
   
   if (confirm("Are you sure you want to confirm Bids")) {
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url: url,
           method: "POST",
           dataType: "JSON",
           data: {id: id },
           success: function (res) {
            if(res.status == 1){
            toastr.success('Bid Confirmed successfully', 'Success');
            location.reload();
            }else {
               toastr.warning('Bid Decline successfully', 'Warning');
               }
            }
       });
   } 
 }

 function end_auctions(url,id) {
   
   if (confirm("Are you sure you want to end this auction")) {
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url: url,
           method: "POST",
           dataType: "JSON",
           data: {id: id },
           success: function (res) {
             window.setTimeout(function () {
                    window.location.href = res.surl;
                }, 1000);
            if(res.status == 1){
            toastr.success('Auction End successfully', 'Success');
            }else {
               toastr.warnind('Decline successfully', 'Warning');
               }
            }
       });
   } 
 }


    </script>

@endsection