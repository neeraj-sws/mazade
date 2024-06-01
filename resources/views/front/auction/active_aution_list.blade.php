<div>
<div class="top-bar-bid">
    You have {{ count($list) }} active bids with this category
</div>
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
<div class="bidding-list">
    <div>
    <?php 
    
    foreach ($list as $lists) {
        
   ?>
  
    <div class="bidding-item">
     <div class="bidding-item-inner">
        <div class="biding-info">
            <h3 class="bidding-title">{{ $lists->title }}</h3>
            <!--<h4 class="bidding-title-2"><b>Current bid:</b> ${{ $lists->latestBid($lists->id)}}  </h4>-->
            <h4 class="bidding-title-2"><b>Budget:</b> ${{ $lists->budget}}  </h4>
            <h4 class="bidding-title-2"><b>Category:</b> {{ $lists->CatId->title}}  </h4>
            <h4 class="bidding-title-2"><b>Sub Category:</b> {{ $lists->subcatid->title}}  </h4>
            @foreach ($lists->auctionMetaDatails as $inputdata)
            <h4 class="bidding-title-2"><b>{{ $inputdata->metaInput->title  }}:</b> {{ $inputdata->meta_value}}  </h4> 
            @endforeach
           
            <p class="bidding-description">{{ $lists->message }}</p>
        </div>
        <div class="price-info">
             <h4 class="bidding-title-2"><b>Current bid:</b>${{ $lists->latestBid($lists->id) }}</h4>
            <a href="{{ route('bid-details', $lists->id) }}"><button class="bid-now-btn">Bid Now</button></a>
            
        </div>
        </div>
        <div class="main-review-info-sec">
           
            <div class="bid-loaction-main">
              <div class="review-main-back">
               <i class="fas fa-history"></i><p><b>Time left:</b><div id="countdown_{{ $lists->id }}"></div></p>
               </div>
            </div>
            
            </div>
    </div>
<?php }
?>
 </div>
</div>
</div>


<script>
    $(document).ready(function() {
    @foreach($list as $item)
       var startTime_{{ $item->id }} =  new Date("{{ $item->created_at }}").getTime();
        var duration = 24 * 60 * 60 * 1000; // Duration in milliseconds (24 hours)
        var endDateTime_{{ $item->id }} = startTime_{{ $item->id }} + duration;
        var countdownElement_{{ $item->id }} = document.getElementById("countdown_{{ $item->id }}");
        // Update the countdown every second
        setInterval(function() {
            var now = new Date().getTime();
            var distance = endDateTime_{{ $item->id }} - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            countdownElement_{{ $item->id }}.innerHTML = days + "days " + hours + "h " + minutes + "m " + seconds + "s ";
            // If the countdown is over, display 'EXPIRED' or take appropriate action
            if (distance < 0) {
                countdownElement_{{ $item->id }}.innerHTML = "EXPIRED";
            }
        }, 1000);
    @endforeach
    });
</script>

