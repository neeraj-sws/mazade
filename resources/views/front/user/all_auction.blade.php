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
                     @if($user->role == 1)
                     <a class="new-auction-btn-main" href="{{ route('new-auction') }}"><button>Start new auction</button></a>
                     @endif
               </div>
               <div class="form-group mb-3">
                       <label for="">Select Auctions</label>
                       <div class="col-sm-8" id="auction_data">
                           <label class="radio-inline me-3">
                               <input type="radio" name="auction" @if($type == 'all') checked @endif onclick="auction_data(this,1)" class="all align-middle" checked value="1"> All Auctions
                           </label>
                           <label class="radio-inline me-3">
                             <input type="radio" name="auction" @if($type == 'active') checked @endif onclick="auction_data(this,2)" class="all align-middle" value="2"> Active Auctions
                            </label>
                           <label class="radio-inline me-3">
                               <input type="radio" name="auction" @if($type == 'complet') checked @endif onclick="auction_data(this,3)" class="all align-middle" value="3"> Completed Auctions
                           </label>
                           <label class="radio-inline me-3">
                               <input type="radio" name="auction" @if($type == 'cancel') checked @endif onclick="auction_data(this,4)" class="all align-middle" value="4"> Cancelled Auctions
                           </label>
                                                                                            
                       </div>
                    </div>
               <div class="table-wrapper" id="new_auction">
                
                  
               </div>
            </div>
                     </div> 
                  </div>
               </div>
            </div>
         </div>
      </div>
      


@endsection


@section('page-js-script')


<script>

$(document).ready(function() {  
   new_auction();    
  });
  
  function new_auction() {
   let url = "";
   @if($user->role == 1)
    url ="{{ route('all-auction-data') }}";
   @else
   url ="{{ route('all-auction-data-seller') }}";
   @endif
    $.ajax({
     
        url: url,     
        success: function (response) {         
                $("#new_auction").html(response);
                
                <?php if($type){
                  if($type == 'all'){ 
                    $val = 1;
                  }elseif($type == 'active'){
                     $val = 2;
                  }elseif($type == 'complet'){
                     $val = 3;
                  }elseif($type == 'cancel'){
                     $val = 4;
                  }
                  ?>
                 auction_data(this,<?php echo $val; ?>);
               <?php }?>  
               
        },       
    });
}

document.getElementById("closeBtn2").onclick = function() {
          document.getElementById("popup2").style.display = "none";
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
 
 function auction_data(e,val){
      let url = "";
      @if($user->role == 1)
      url ="{{ route('select-auction') }}";
      @else
      url ="{{ route('all-auction-seller') }}";
      @endif
   
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url:  url,
           method: "POST",
           data: { 
            auction_data:val,
           },
          
            success: function (response) {         
                $("#new_auction").html(response);          
        },       
            
       });
   

};

 
</script>


@endsection
