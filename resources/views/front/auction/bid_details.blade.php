@extends('layouts.front')

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
                        ID Order : 1
                      </div>
                      <div class="col-md-6 mb-3 d-flex justify-content-end">
                         <div id="countdown"></div>
                      </div>
                      <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                        Category : Real estate
                        </div>
                      </div>
                      <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                        Budget : $900
                        </div>
                      </div>
                      <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                        Last Price : $900
                        </div>
                      </div>
                      <div class="col-md-12 my-3">
                         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                      </div>
                      <div class="col-md-3 mb-3">
                          <a id="popupBtn" class="end-btn company-end-btn new-bid-btn"></i>Bid</a>
                      </div>
                   
                    </div>
                  </form>
                </div>

                  </div>
               </div>
            </div>
         </div>
      </div>


<div id="popup" class="popup">
  <div class="popup-content popup-new-content">
   <form>
   <div class="row">
      
      <div class="col-md-6 mb-4">
         <div class="detail-box-main">
         ID Order : 1
          </div>
      </div>
      <div class="col-md-6 mb-4">
      <div class="detail-box-main">
         Category : Real estate
      </div>
      </div>
      <div class="col-md-12 mb-3 all-form-data mb-4">
         <input type="text" id="Price" placeholder="Price" name="lastPrice">
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
@endsection

@section('page-js-script')
<script>
        // Set the target date and time
        const targetDate = new Date();
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