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
                              <h3>Wallet History</h3>
                           </div>
                           <div class="table-wrapper">
                              <table class="eg-table order-table table mb-0">
                                 <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @php $no = 1; @endphp
                                   @foreach ($walletHistories as $walletHistory)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $walletHistory->amount }}</td>
                                        <td>@if($walletHistory->status == 1) <span class="badge rounded-pill bg-danger" > Out-going <span> @elseif($walletHistory->status == 0) <span class="badge rounded-pill bg-primary" >Incoming</span>  @endif</td>
                                        <td>{{ $walletHistory->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                    @php $no++; @endphp
                                    @endforeach
                                 </tbody>
                              </table>
                              <div class="pagination-links">
                                {!! $walletHistories->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

@endsection
