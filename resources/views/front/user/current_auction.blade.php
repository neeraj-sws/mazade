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
                  <h3>Current Auctions </h3>
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
                           <th>Bids</th>
                           <th>Current Price</th>
                           <th>Seller <br> Profile</th>
                           <th colspan="3">Action</th>
                          
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
                           <td data-label="Highest Bid">{{ $auctions->auctionItem->count(); }}</td>
                           <td data-label="Status" class="text-green">${{ $auctions->latestBid($auctions->id)}}</td>
                           <td data-label="Status" class="text-green"><a href="javascript:void(0);"><i class="far fa-user"></i></a></td>


                           <td data-label="Action"><a href="{{ route('bid-details', $auctions->id) }}" ><button class="cancel-btn">Detail </button></a></td> 

                           @if ($auctions->status == 2)
                           
                           <td data-label="Action"><a href="javascript:void(0);" ><button class="cancel-btn"><i class="fas fa-times" aria-hidden="true"></i> Cancelled </button></a></td> 
                           @else
                           <td data-label="Action"><a href="javascript:void(0);" class="cancel-btn"  onclick="Auction_Cancelled('{{ route('auction-bit') }}','2', {{ $auctions->id }},'Cancel')"><button class="cancel-btn"><i class="fas fa-times" aria-hidden="true"></i> Cancel</button></a></td> 
                           @endif
                           
                           @if ($auctions->is_start == 0)
                           <td data-label="Status" class="text-green"><a href="javascript:void(0);" class="cancel-btn"  onclick="Auction_End('{{ route('auction-end') }}','1', {{ $auctions->id }},'End')"><button class="end-btn">End Auction</button></a></td> 
                           @else
                           <td data-label="Status" class="text-green"><a href="javascript:void(0);"><button class="end-btn">End Auction</button></a></td> 
                           @endif

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


@endsection
