<div>
   <div class="float-end mt-2">
      <a href="javascript:void(0);" onclick="changelist('grid')">
       <button type="btn" class="bid-now-btn"><i class="fa fa-th" aria-hidden="true"></i></button>
       </a>
       <a href="javascript:void(0);" onclick="changelist('list')">
           <button type="btn" class="bid-now-btn"><i class="fa fa-list" aria-hidden="true"></i>
           </button>
       </a>
   </div>
 <div class="clearfix"></div>
<div class="row gy-4 mb-60 d-flex justify-content-center">

    <?php 
    
    foreach ($list as $lists) {
        
   ?>
    <div class="col-lg-4 col-md-6 col-sm-10 ">
       <div data-wow-duration="1.5s" data-wow-delay="0.2s" class="eg-card auction-card1 wow fadeInDown" style="min-height: 200px;">
          <div class="auction-img">
             <img alt="image" src="{{asset('front_assets/images/bike-1.jpg') }}">
             <div class="auction-timer">
                <div class="countdown" id="timer1">
                   <h4><span id="hours1">05</span>H : <span id="minutes1">52</span>M : <span id="seconds1">32</span>S</h4>
                </div>
             </div>
          </div>
          <div class="auction-content">
            <h5 class="bidding-title">{{ $lists->title }}</h5>
            <h5 class="bidding-title-2"><b>Current bid:</b> ${{ $lists->latestBid($lists->id)}}  </h5>
            <h5 class="bidding-title-2"><b>Your bid:</b> ${{ $lists->budget}}  </h5>
            <h5 class="bidding-title-2"><b>Category:</b> {{ $lists->CatId->title}}  </h5>
            <h5 class="bidding-title-2"><b>Sub Category:</b> {{ $lists->subcatid->title}}  </h5>
             <p>Bidding Price : <span>${{ $lists->budget }}</span></p>
             <div class="auction-card-bttm">
                <a href="{{ route('bid-details', $lists->id) }}" class="eg-btn btn--primary btn--sm">Place a Bid</a>
                <div class="share-area">
                   <ul class="social-icons d-flex">
                      <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                      <li><a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                      <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest"></i></a></li>
                      <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                   </ul>
                   <div>
                      <a href="#" class="share-btn"><i class="bx bxs-share-alt"></i></a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <?php }
    ?>
 </div>
 </div>