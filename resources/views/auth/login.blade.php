@extends('layouts.auth')

@section('content')
<div class="login-section pb-120">
         <img alt="imges" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
         <img alt="imges" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
         <div class="container">
            <div class="row d-flex justify-content-center g-4">
               <div class="col-xl-6 col-lg-8 col-md-10">
                  <div class="form-wrapper wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                     <div class="form-title">
                        <h3>Log In</h3>
                     </div>
                     <form class="w-100" action="{{ route('submit.login') }}" method="POST" onsubmit="event.preventDefault();loginform_submit(this);return false;">
                     @csrf
                     <div class="row">
                           <div class="col-12">
                              <div class="form-inner">
                                 <label>Enter Your Email *</label>
                                 <input type="email" name="email" placeholder="Enter Your Email">
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form-inner">
                                 <label>Password *</label>
                                 <input type="password" name="password" id="password" placeholder="Password" />
                                 <i class="bi bi-eye-slash" name="password" id="togglePassword"></i>
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form-agreement form-inner d-flex justify-content-between flex-wrap">
                                 <div class="form-group">
                                    <label for="html"></label>
                                 </div>
                                 <a href="#" class="forgot-pass text-decoration-underline">Forgotten Password</a>
                              </div>
                           </div>
                        </div>
                        <button type="submit" class="account-btn">Log in</button>
                     </form>
                     <p class="mt-2 text-center">New Member? <a href="{{ route('register') }}">signup here</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection

<script>
    function loginform_submit(e) {
   
   //toastr.clear();
   $(e).find('.st_loader').show();
   $.ajax({
     url: $(e).attr('action'),
     method: "POST",
     dataType: "json",
     data: $(e).serialize(),
     success: function (data) {
       if (data.status == 1) {
        // alert('hii');
         //toastr.success(data.message, 'Success');
        window.location.href = base_url+'home';
        
        //  dataTable.draw(false);

       } else if (data.status == 0) {
 
         var $err = '';
         $.each(data.errors, function (key, value) {
           $err = $err + value + "<br>";
         });
        // toastr.error($err, 'Error');
       }
       else if (data.status == 2) {
        // toastr.success(data.message, 'Success');
         window.setTimeout(function () {
           window.location.href = data.surl;
         }, 1000);
       }
     },
     error: function (data) {
       if (typeof data.responseJSON.status !== 'undefined') {
         toastr.error(data.responseJSON.error, 'Error');
       } else {
         var $err = '';
         $.each(data.responseJSON.errors, function (key, value) {
           $err = $err + value + "<br>";
         });
        // toastr.error($err, 'Error');
       }
       $(e).find('.st_loader').hide();
     }
   });
 }
 </script>
