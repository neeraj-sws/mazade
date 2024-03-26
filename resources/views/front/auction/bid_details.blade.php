@extends('layouts.front')
@section('page-css-script')
<link rel="stylesheet" href="{{asset('front_assets/css/profile.css') }}">
@endsection
@section('content')
<div class="inner-banner">
         <div class="container">
            <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Name category</h2>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Name category</li>
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
                  <form>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                      {{ $auction->title }}
                      </div>
                      <div class="col-md-6 mb-3 d-flex justify-content-end">
                         <div id="countdown"></div>
                      </div>
                      <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                        Category : {{ $auction->CatId->title }}
                        </div>
                      </div>
                      <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                        Budget : ${{ $auction->budget }}
                        </div>
                      </div>
                      <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                        Last Price : ${{ $auction->latestBid($auction->id)}}
                        </div>
                      </div>
                      <div class="col-md-12 my-3">
                         <p>{{ $auction->message }}</p>
                      </div>
                      @if (Auth::guard('web')->user()->company)
                      <div class="col-md-3 mb-3">
                          <a id="popupBtn" class="end-btn company-end-btn new-bid-btn"></i>Bid</a>
                      </div>
                     @endif
                    </div>
                  </form>
                </div>

                  </div>
               </div>
               @if (!Auth::guard('web')->user()->company)
               <div class="profile-info col-md-9">
      <div class="panel">
          <div class="panel-body bio-graph-info">
              <div class="bio-main-3434">
              <h1>Bids</h1>
               </div>
              <div class="row">
                 <table class="table">
                  <tr>
                     <th>S.No.</th>
                     <th>Company</th>
                     <th>Big amount</th>
                     <th>Action</th>
                  </tr>
               @php $i=1; @endphp   
               @foreach($auction->auctionItem as $item)
               @php 
               // echo '<pre>'; print_r($item->companyId->company_name); die;
                   @endphp
                  <tr>
                     <td>{{ $i++; }}</td>
                     <td>{{ @$item->companyId->company_name }}</td>
                     <td>${{ $item->price }}</td>
                     @if ($item->status == 1)
                     <td>
                        <a href="javascript:void(0)" claSS="btn btn-success">Confirmed</a>
                        </td>
                     @else
                     <td data-label="Action"><a href="javascript:void(0);" class="btn btn-danger"  onclick="Order_Confirm('{{ route('comfirm-order') }}','1', {{ $item->id }},'Cancel')">Comfirm</a></td> 
                     @endif
                  </tr>
                  @endforeach
                 </table>
              </div>
          </div>
      </div>

      

  </div>
  @endif
            </div>
         </div>
      </div>

      @if (Auth::guard('web')->user()->company)
<div id="popup" class="popup">
  <div class="popup-content popup-new-content">
      <form class="row g-3" action="{{ route('bidadd') }}" method="POST" onsubmit="event.preventDefault();form_submit(this);return false;" enctype="multipart/form-data">
      <!-- Form fields here -->
      @csrf

      <div data-mdb-input-init class="form-outline mb-4">
         <input type="hidden" name="auction_id"  value="{{ $auction->id }}" id="form4Example1" class="form-control"  readonly/>
     </div>

     <input type="hidden" name="company_id"  value="{{ @$company->id }}" class="form-control"/>

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
      </div>
      <div class="col-md-6 pop-btn-main-sec">
             <input class="company-new-popup-btn" type="submit" value="Bid">
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
        // Set the target date and time
   //const targetDate = new Date();
        const targetDate = new Date("{{ $auction->end_time }}");
      
        targetDate.setDate(targetDate.getDate() + 10);
        targetDate.setHours(12);
        targetDate.setMinutes(20);
        targetDate.setSeconds(13);

        // Update the countdown every second
        const countdownElement = document.getElementById('countdown');
        const countdownInterval = setInterval(updateCountdown, 1000);

        function updateCountdown() {
            const now = new Date();
            const difference = targetDate - now;

            if (difference <= 0) {
                clearInterval(countdownInterval);
                countdownElement.innerHTML = 'Countdown expired';
            } else {
                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                countdownElement.innerHTML = `${days} days ${hours}h ${minutes}m ${seconds}s`;
            }
        }
    </script>

    <script>
  
      document.getElementById("popupBtn").onclick = function() {
      document.getElementById("popup").style.display = "block";
    }

      document.getElementById("closeBtn").onclick = function() {
      document.getElementById("popup").style.display = "none";
    }

    </script>

@endsection