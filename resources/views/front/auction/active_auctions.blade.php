@extends('layouts.front')

@section('content')
<div class="inner-banner">
         <div class="container">
            <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Active Auctions </h2>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Active Auctions</li>
               </ol>
            </nav>
         </div>
      </div>

      <div id="category-select">
    <div class="container">
        <div class="row">
            <div class="sidebar">
            <form>
               <div class="main-cat-title">
               <h2 class="main-cat-title-inner">Search for bid</h2>
               </div>
               <div class="search_panel">
               
                    <input type="text" id="searchInput" placeholder="Search...">
                    <button class="searchButton" onclick="action_filter()" type="button">Search</button>
                </div>
                <div class="main-cat-title">
               <h2 class="main-cat-title-inner">Select Categories</h2>
               </div>
                <div class="cat-main-1212">
                   
                    <div class="category-list">


                     <!-- Category-1 -->

                    @foreach($categories as $category) 

                        <div class="category">
                            <input onchange="action_filter()" type="checkbox" name="cat_id[]" id="category{{ $category->id }}" class="category-checkbox">
                            <label for="category{{ $category->id }}" class="category-label">{{ $category->title }}</label>
                            @if(count($category->sub_category) > 0)
                            <div class="subcategories">
                                @foreach($category->sub_category as $sub_cat) 
                                <div class="subcategory">
                                    <input onchange="action_filter()" type="checkbox" name="sub_cat_id[]" id="subcategory1-{{ $sub_cat->id }}" class="subcategory-checkbox">
                                    <label for="subcategory1-{{ $sub_cat->id }}" class="subcategory-label">{{ $sub_cat->title }}</label>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    @endforeach
                        <!-- category-1-end -->




                        <!-- Add more categories and subcategories here -->
                    </div>
                </div>
                </form>
            </div>
            <div id="main-bid-list-new" class="bid-list">
                <div class="top-bar-bid">
                    You have {{ count($list) }} active bids with this category
                </div>
                <div class="bidding-list">
                    <?php 
                    // echo '<pre>'; print_r($list->toArray()); die;
                    foreach ($list as $lists) {
                        
                   ?>
                  
                    <div class="bidding-item">
                     <div class="bidding-item-inner">
                        <div class="biding-info">
                            <h3 class="bidding-title">{{ $lists->title }}</h3>
                            <h4 class="bidding-title-2"><b>Current bid:</b> ${{ $lists->latestBid($lists->id)}}  </h4>
                            <p class="bidding-description">{{ $lists->message }}</p>
                        </div>
                        <div class="price-info">
                            <h5 class="bidding-price">${{ $lists->budget }}</h5>
                            <a href="{{ route('bid-details', $lists->id) }}"><button class="bid-now-btn">Bid Now</button></a>
                            
                        </div>
                        </div>
                        <div class="main-review-info-sec">
                            <div class="review-stars">
                              <h5>4.0</h5>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9734;</span>
                                <p>(3 Reviews)</p>
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
    </div>
</div>


@endsection


@section('page-js-script')

<script>
    // Loop through each row and calculate countdown for each end time
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



function action_filter() {
    // $('#st_loader_' + id).show();
    
    // if(type){
    //   var statusText = type;
    // }else{
    //   var statusText = newStatus === 1 ? 'Active' : 'Inactive';
    // }

    // if (confirm("Are you sure you want to set the status to " + statusText + "?")) {
    //     $.ajax({
    //         'headers': {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: url,
    //         method: "POST",
    //         dataType: "JSON",
    //         data: { id: id, status: newStatus },
    //         success: function (res) {
    //             $('#st_loader_' + id).hide();

    //             toastr.success('Status changed successfully', 'Success');
    //             dataTable.draw(false);
    //         }
    //     });
    // } else {
    //     // Optionally handle the case when the user cancels the confirmation
    // }
}

    </script>
@endsection
