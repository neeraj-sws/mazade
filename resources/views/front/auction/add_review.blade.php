@extends('layouts.auction')

@section('content')
<div class="login-section pt-30 pb-120">
         <img alt="imges" src="assets/images/bg/section-bg.png" class="img-fluid section-bg-top">
         <img alt="imges" src="assets/images/bg/section-bg.png" class="img-fluid section-bg-bottom">
         <div class="container">
            <div class="row d-flex justify-content-center g-4">
               <div class="col-xl-8 col-lg-10 col-md-12">
                  <div class="form-wrapper wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                     <div class="main-review-111">
                        <div class="row payment-top-info">
                           <div class="col-md-6 my-4">
                              <div class="detail-box-main">
                                 <b>Seller Name :</b> John doe
                              </div>
                           </div>
                           <div class="col-md-6 my-4">
                              <div class="detail-box-main">
                                 <b>Listing Title :</b> Bike
                              </div>
                           </div>
                      </div>
                      <h2>Leave a Review</h2>
                       <form id="reviewForm">
                         <div class="form-group">
                           <label>Select your rating:</label>
                           <div id="stars">
                             <span class="star" data-value="1">☆</span>
                             <span class="star" data-value="2">☆</span>
                             <span class="star" data-value="3">☆</span>
                             <span class="star" data-value="4">☆</span>
                             <span class="star" data-value="5">☆</span>
                           </div>
                           <input type="hidden" id="rating" name="rating">
                         </div>
                         <div class="form-group hidden" id="additionalFields">
                           <label>Tell us more about your experience:</label>
                           <textarea id="experienceText" name="experience"></textarea>
                           <label>Give your review a title:</label>
                           <input type="text" id="title" name="title">
                           <label>Your email:</label>
                           <input type="email" id="email" name="email">
                           <input class="mt-3 new-submit-review" type="submit" value="Submit Review">
                         </div>
                       </form>
                     </div>  
                  </div>
               </div>
            </div>
         </div>
      </div>

@endsection


@section('page-js-script')
<script>
        const stars = document.querySelectorAll('.star');
        const additionalFields = document.getElementById('additionalFields');

        stars.forEach(star => {
          star.addEventListener('click', () => {
            const rating = parseInt(star.getAttribute('data-value'));
            document.getElementById('rating').value = rating;
            stars.forEach((s, index) => {
              s.textContent = index < rating ? '★' : '☆';
            });
            additionalFields.classList.remove('hidden');
          });
        });

        document.getElementById('reviewForm').addEventListener('submit', e => {
          e.preventDefault();
          // Handle form submission here
          alert('Review submitted successfully!');
        });
      </script>

@endsection
