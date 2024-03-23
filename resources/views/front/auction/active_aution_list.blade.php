<div>
<div class="top-bar-bid">
    You have {{ count($list) }} active bids with this category
</div>
<div class="bidding-list">
    <div>
    <?php 
    // echo '<pre>'; print_r($list->toArray()); die;
    foreach ($list as $lists) {
        
   ?>
  
    <div class="bidding-item">
     <div class="bidding-item-inner">
        <div class="biding-info">
            <h3 class="bidding-title">{{ $lists->title }}</h3>
            <h4 class="bidding-title-2"><b>Current bid:</b> ${{ $lists->latestBid($lists->id)}}  </h4>
            <h4 class="bidding-title-2"><b>Your bid:</b> ${{ $lists->budget}}  </h4>
            <h4 class="bidding-title-2"><b>Category:</b> {{ $lists->CatId->title}}  </h4>
            <h4 class="bidding-title-2"><b>Sub Category:</b> {{ $lists->subcatid->title}}  </h4>
            <p class="bidding-description">{{ $lists->message }}</p>
        </div>
        <div class="price-info">
            <h5 class="bidding-price">${{ $lists->budget }}</h5>
            <a href="{{ route('bid-details', $lists->id) }}"><button class="bid-now-btn">Bid Now</button></a>
            
        </div>
        </div>
        <div class="main-review-info-sec">
            <div class="review-stars">
              <h5>{{$rating->avg_rating}}.0</h5>
              <?php $numberOfStars = 5;
              for ($i = 0; $i < $numberOfStars; $i++) {  
                if($i < $rating->avg_rating){
                echo '<span class="star">&#9733;</span>';
              }else{
                echo '<span class="star">&#9734;</span>';
              } }?>

                <p>({{$rating->total_rating}} Reviews)</p>
            </div>
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

@section('page-js-script')

<script>

    @foreach($list as $item)
        var endDateTime_{{ $item->id }} = new Date("{{ $item->end_time }}").getTime();
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
    
    
   
    
        </script>
    @endsection
