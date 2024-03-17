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
               <div class="main-cat-title">
               <h2 class="main-cat-title-inner">Search for bid</h2>
               </div>
                <form>
                    <input type="text" id="searchInput" placeholder="Search...">
                    <button type="submit">Search</button>
                </form>
                <div class="main-cat-title">
               <h2 class="main-cat-title-inner">Select Categories</h2>
               </div>
                <div class="cat-main-1212">
                   
                    <div class="category-list">


                     <!-- Category-1 -->


                        <div class="category">
                            <input type="checkbox" id="category1" class="category-checkbox">
                            <label for="category1" class="category-label">Bike</label>
                            <div class="subcategories">
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-1" class="subcategory-checkbox">
                                    <label for="subcategory1-1" class="subcategory-label">Cruiser</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-2" class="subcategory-checkbox">
                                    <label for="subcategory1-2" class="subcategory-label">Sport bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-3" class="subcategory-checkbox">
                                    <label for="subcategory1-3" class="subcategory-label">Road bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-4" class="subcategory-checkbox">
                                    <label for="subcategory1-4" class="subcategory-label">Scooter</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-5" class="subcategory-checkbox">
                                    <label for="subcategory1-5" class="subcategory-label">Dual sport</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-6" class="subcategory-checkbox">
                                    <label for="subcategory1-6" class="subcategory-label">Enduro</label>
                                </div>
                            </div>
                        </div>

                        <!-- category-1-end -->


                        <!-- Category-2 -->


                        <div class="category">
                            <input type="checkbox" id="category1" class="category-checkbox">
                            <label for="category1" class="category-label">Car</label>
                            <div class="subcategories">
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-1" class="subcategory-checkbox">
                                    <label for="subcategory1-1" class="subcategory-label">Cruiser</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-2" class="subcategory-checkbox">
                                    <label for="subcategory1-2" class="subcategory-label">Sport bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-3" class="subcategory-checkbox">
                                    <label for="subcategory1-3" class="subcategory-label">Road bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-4" class="subcategory-checkbox">
                                    <label for="subcategory1-4" class="subcategory-label">Scooter</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-5" class="subcategory-checkbox">
                                    <label for="subcategory1-5" class="subcategory-label">Dual sport</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-6" class="subcategory-checkbox">
                                    <label for="subcategory1-6" class="subcategory-label">Enduro</label>
                                </div>
                            </div>
                        </div>

                        <!-- category-2-end -->

                        <!-- Category-3 -->


                        <div class="category">
                            <input type="checkbox" id="category1" class="category-checkbox">
                            <label for="category1" class="category-label">Real Estate</label>
                            <div class="subcategories">
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-1" class="subcategory-checkbox">
                                    <label for="subcategory1-1" class="subcategory-label">Cruiser</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-2" class="subcategory-checkbox">
                                    <label for="subcategory1-2" class="subcategory-label">Sport bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-3" class="subcategory-checkbox">
                                    <label for="subcategory1-3" class="subcategory-label">Road bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-4" class="subcategory-checkbox">
                                    <label for="subcategory1-4" class="subcategory-label">Scooter</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-5" class="subcategory-checkbox">
                                    <label for="subcategory1-5" class="subcategory-label">Dual sport</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-6" class="subcategory-checkbox">
                                    <label for="subcategory1-6" class="subcategory-label">Enduro</label>
                                </div>
                            </div>
                        </div>

                        <!-- category-3-end -->

                        <!-- Category-4 -->


                        <div class="category">
                            <input type="checkbox" id="category1" class="category-checkbox">
                            <label for="category1" class="category-label">Electronics</label>
                            <div class="subcategories">
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-1" class="subcategory-checkbox">
                                    <label for="subcategory1-1" class="subcategory-label">Cruiser</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-2" class="subcategory-checkbox">
                                    <label for="subcategory1-2" class="subcategory-label">Sport bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-3" class="subcategory-checkbox">
                                    <label for="subcategory1-3" class="subcategory-label">Road bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-4" class="subcategory-checkbox">
                                    <label for="subcategory1-4" class="subcategory-label">Scooter</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-5" class="subcategory-checkbox">
                                    <label for="subcategory1-5" class="subcategory-label">Dual sport</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-6" class="subcategory-checkbox">
                                    <label for="subcategory1-6" class="subcategory-label">Enduro</label>
                                </div>
                            </div>
                        </div>

                        <!-- category-4-end -->


                        <!-- Category-5 -->


                        <div class="category">
                            <input type="checkbox" id="category1" class="category-checkbox">
                            <label for="category1" class="category-label">Health</label>
                            <div class="subcategories">
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-1" class="subcategory-checkbox">
                                    <label for="subcategory1-1" class="subcategory-label">Cruiser</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-2" class="subcategory-checkbox">
                                    <label for="subcategory1-2" class="subcategory-label">Sport bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-3" class="subcategory-checkbox">
                                    <label for="subcategory1-3" class="subcategory-label">Road bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-4" class="subcategory-checkbox">
                                    <label for="subcategory1-4" class="subcategory-label">Scooter</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-5" class="subcategory-checkbox">
                                    <label for="subcategory1-5" class="subcategory-label">Dual sport</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-6" class="subcategory-checkbox">
                                    <label for="subcategory1-6" class="subcategory-label">Enduro</label>
                                </div>
                            </div>
                        </div>

                        <!-- category-5-end -->


                        <!-- Category-6 -->


                        <div class="category">
                            <input type="checkbox" id="category1" class="category-checkbox">
                            <label for="category1" class="category-label">Furniture</label>
                            <div class="subcategories">
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-1" class="subcategory-checkbox">
                                    <label for="subcategory1-1" class="subcategory-label">Cruiser</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-2" class="subcategory-checkbox">
                                    <label for="subcategory1-2" class="subcategory-label">Sport bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-3" class="subcategory-checkbox">
                                    <label for="subcategory1-3" class="subcategory-label">Road bikes</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-4" class="subcategory-checkbox">
                                    <label for="subcategory1-4" class="subcategory-label">Scooter</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-5" class="subcategory-checkbox">
                                    <label for="subcategory1-5" class="subcategory-label">Dual sport</label>
                                </div>
                                <div class="subcategory">
                                    <input type="checkbox" id="subcategory1-6" class="subcategory-checkbox">
                                    <label for="subcategory1-6" class="subcategory-label">Enduro</label>
                                </div>
                            </div>
                        </div>

                        <!-- category-6-end -->


                        <!-- Add more categories and subcategories here -->
                    </div>
                </div>
            </div>
            <div id="main-bid-list-new" class="bid-list">
                <div class="top-bar-bid">
                    You have 4 active bids with this category
                </div>
                <div class="bidding-list">
                    <div class="bidding-item">
                     <div class="bidding-item-inner">
                        <div class="biding-info">
                            <h3 class="bidding-title">I need a bike</h3>
                            <h4 class="bidding-title-2"><b>current bid:</b> $90  </h4>
                            <p class="bidding-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <div class="price-info">
                            <h5 class="bidding-price">$100</h5>
                            <a href="bid-detail.html"><button class="bid-now-btn">Bid Now</button></a>
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
                               <i class="fas fa-history"></i><p><b>Time left:</b><div id="countdowns"></div></p>
                               </div>
                            </div>
                            
                            </div>
                    </div>
                    <!-- Add more bidding items here -->
                    <div class="bidding-item">
                     <div class="bidding-item-inner">
                        <div class="biding-info">
                            <h3 class="bidding-title">I need a car</h3>
                            <h4 class="bidding-title-2"><b>current bid:</b> $90  </h4>
                            <p class="bidding-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <div class="price-info">
                            <h5 class="bidding-price">$100</h5>
                            <a href="bid-detail.html"><button class="bid-now-btn">Bid Now</button></a>
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
                               <i class="fas fa-history"></i><p><b>Time left:</b><div id="countdowns2"></div></p>
                               </div>
                            </div>
                            
                            </div>
                    </div>


                    <div class="bidding-item">
                     <div class="bidding-item-inner">
                        <div class="biding-info">
                            <h3 class="bidding-title">I need a bike</h3>
                            <h4 class="bidding-title-2"><b>current bid:</b> $90  </h4>
                            <p class="bidding-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <div class="price-info">
                            <h5 class="bidding-price">$100</h5>
                             <a href="bid-detail.html"><button class="bid-now-btn">Bid Now</button></a>
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
                               <i class="fas fa-history"></i><p><b>Time left:</b><div id="countdowns3"></div></p>
                               </div>
                            </div>
                            
                            </div>
                    </div>

                    <div class="table-pagination">
                  <p>Showing 10 to 20 of 1 entries</p>
                  <nav class="pagination-wrap">
                     <ul class="pagination style-two d-flex justify-content-center gap-md-3 gap-2">
                        <li class="page-item">
                           <a class="page-link" href="#" tabindex="-1">Prev</a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">01</a></li>
                        <li class="page-item">
                           <a class="page-link" href="#">02</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item">
                           <a class="page-link" href="#">Next</a>
                        </li>
                     </ul>
                  </nav>
               </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('page-js-script')
<script>
         function createCountdown(targetDate) {
             const countdownElement = document.createElement('div');
         
             // Update the countdown every second
             const countdownInterval = setInterval(() => {
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
             }, 1000);
         
             return countdownElement;
         }
         
         // Add countdown timers to multiple places
         const countdownsElement = document.getElementById('countdowns');
         countdownsElement.appendChild(createCountdown(getTargetDate()));
         
         const countdownsElement2 = document.getElementById('countdowns2');
         countdownsElement2.appendChild(createCountdown(getTargetDate()));
         
         const countdownsElement3 = document.getElementById('countdowns3');
         countdownsElement3.appendChild(createCountdown(getTargetDate()));
         
         const countdownsElement4 = document.getElementById('countdowns4');
         countdownsElement4.appendChild(createCountdown(getTargetDate()));
         
         const countdownsElement5 = document.getElementById('countdowns5');
         countdownsElement5.appendChild(createCountdown(getTargetDate()));
         
         function getTargetDate() {
             const targetDate = new Date();
             targetDate.setDate(targetDate.getDate() + 10);
             targetDate.setHours(12);
             targetDate.setMinutes(20);
             targetDate.setSeconds(13);
             return targetDate;
         }
      </script>

@endsection
