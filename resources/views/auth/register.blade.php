@extends('layouts.auth')

@section('content')
<div class="signup-section pt-100 pb-120">
         <div class="container">
            <div class="row d-flex justify-content-center">
               <div class="col-xl-9 col-lg-9 col-md-9">
                  <div class="form-wrapper wow fadeInUp register-top-slider" data-wow-duration="1.5s" data-wow-delay=".2s">
                     <div class="register-main">
                        <h2>Register Page</h2>
                        <div class="register-select d-flex flex-column">
                           <label for="roleSelect">Choose the Role:</label>
                           <select id="roleSelect" onchange="showFields()">
                              <option value="" disabled selected>Choose the Role</option>
                              <option value="user" selected>User</option>
                              <option value="company">Company</option>
                              <option value="both">Both</option>
                           </select>
                        </div>
                        <div id="userFields" style="display: none;">
                           <form action="#" method="post">
                              <div class="all-form-data row">
                                 <h3 class="inner-form-main-title">User</h3>
                                 <div class="col-md-6">
                                    <input type="text" id="firstName" placeholder="First Name" name="firstName" required>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" id="lastName" placeholder="Last Name" name="lastName" required>
                                 </div>
                                 <div class="col-md-12">
                                    <input type="email" id="email" placeholder="Email" name="email" required>
                                 </div>
                                 <div class="col-md-12">
                                    <input type="password" id="password" placeholder="Password" name="password" required>
                                 </div>
                                 <div class="col-md-12">
                                    <input type="password" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword" required>
                                 </div>
                                 <div class="col-md-12">
                                    <input type="tel" id="phone" name="phone" placeholder="Phone:" pattern="[0-9]{10}" required>
                                 </div>
                                 <input class="user-submit" type="submit" value="Register">
                                 <p class="text-center">Have an Account?<a href="login.html">Login</a></p>
                              </div>
                           </form>
                        </div>
                        <div id="companyFields" style="display: none;">
                           <div class="all-form-data row">
                              <h3 class="inner-form-main-title">Company</h3>
                              <div class="col-md-12">
                                 <input type="text" id="companyName" placeholder="Company Name" name="companyName" required>
                              </div>
                              <div class="col-md-12">
                                 <input id="address" name="address" placeholder="Address" required>
                              </div>
                              <div class="col-md-12">
                                 <input type="tel" id="phone" name="phone" placeholder="Phone" pattern="[0-9]{10}" required>
                              </div>
                              <div class="col-md-12">
                                 <input type="text" id="commercialRegister" placeholder="Commercial Register" name="commercialRegister" required>
                              </div>
                              <input class="user-submit" type="submit" value="Register">
                              <p class="text-center">Have an Account?<a href="login.html">Login</a></p>
                           </div>
                        </div>
                        <div id="bothFields" style="display: none;">
                           <form action="#" method="post">
                              <div class="all-form-data row">
                                 <h3 class="inner-form-main-title">User</h3>
                                 <div class="col-md-6">
                                    <input type="text" id="firstName" placeholder="First Name" name="firstName" required>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" id="lastName" placeholder="Last Name" name="lastName" required>
                                 </div>
                                 <div class="col-md-12">
                                    <input type="email" id="email" placeholder="Email" name="email" required>
                                 </div>
                                 <div class="col-md-12">
                                    <input type="password" id="password" placeholder="Password" name="password" required>
                                 </div>
                                 <div class="col-md-12">
                                    <input type="password" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword" required>
                                 </div>
                                 <div class="col-md-12">
                                    <input type="tel" id="phone" name="phone" placeholder="Phone:" pattern="[0-9]{10}" required>
                                 </div>
                                 <h3 class="inner-form-main-title">Company</h3>
                                 <div class="col-md-12">
                                    <input type="text" id="companyName" placeholder="Company Name" name="companyName" required>
                                 </div>
                                 <div class="col-md-12">
                                    <input id="address" name="address" placeholder="Address" required>
                                 </div>
                                 <div class="col-md-12">
                                    <input type="tel" id="phone" name="phone" placeholder="Phone" pattern="[0-9]{10}" required>
                                 </div>
                                 <div class="col-md-12">
                                    <input type="text" id="commercialRegister" placeholder="Commercial Register" name="commercialRegister" required>
                                 </div>
                                 <input class="user-submit" type="submit" value="Register">
                                 <p class="text-center">Have an Account?<a href="login.html">Login</a></p>
                              </div>
                           </form>
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
         document.addEventListener("DOMContentLoaded", function() {
             showFields();
         });
         
         function showFields() {
             var role = document.getElementById("roleSelect").value;
             document.getElementById("userFields").style.display = "none";
             document.getElementById("companyFields").style.display = "none";
             document.getElementById("bothFields").style.display = "none";
         
             if (role === "user") {
                 document.getElementById("userFields").style.display = "block";
             } else if (role === "company") {
                 document.getElementById("companyFields").style.display = "block";
             } else if (role === "both") {
                 document.getElementById("bothFields").style.display = "block";
             }
         }
      </script>

 <script>
    function registerform_submit(e) {
   
   toastr.clear();
   $(e).find('.st_loader').show();
   $.ajax({
     url: $(e).attr('action'),
     method: "POST",
     dataType: "json",
     data: $(e).serialize(),
     success: function (data) {
    // window.location.reload();
       if (data.status == 1) {
        // alert('hii');
         toastr.success(data.message, 'Success');
        window.location.href = base_url+'login';
        
        //  dataTable.draw(false);

       } else if (data.status == 0) {
 
         var $err = '';
         $.each(data.errors, function (key, value) {
           $err = $err + value + "<br>";
         });
         toastr.error($err, 'Error');
       }
       else if (data.status == 2) {
         toastr.success(data.message, 'Success');
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
         toastr.error($err, 'Error');
       }
       $(e).find('.st_loader').hide();
     }
   });
 }

 function companiesform_submit(e) {
   
   toastr.clear();
   $(e).find('.st_loader').show();
   $.ajax({
     url: $(e).attr('action'),
     method: "POST",
     dataType: "json",
     data: $(e).serialize(),
     success: function (data) {
    // window.location.reload();
       if (data.status == 1) {
        // alert('hii');
         toastr.success(data.message, 'Success');
        window.location.href = base_url+'companieslogin.form';
        
        //  dataTable.draw(false);

       } else if (data.status == 0) {
 
         var $err = '';
         $.each(data.errors, function (key, value) {
           $err = $err + value + "<br>";
         });
         toastr.error($err, 'Error');
       }
       else if (data.status == 2) {
         toastr.success(data.message, 'Success');
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
         toastr.error($err, 'Error');
       }
       $(e).find('.st_loader').hide();
     }
   });
 }

 function uploadimage(form, url, id, input) 
{
  alert(id);
  $(form).find('.' + id + '_loader').show();
  $.ajax({
    type: "POST",
    url: url + '?type=' + id,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    contentType: false,
    cache: false,
    processData: false,
    dataType: "json",
    data: new FormData(form[0]),
    success: function (res) {
      if (res.status == 0) {
        $(form).find('.' + id + '_loader').hide();
        toastr.error(res.msg, 'Error');
      } else {
        $(form).find('.' + id + '_loader').hide();
        $('#' + id + '_prev').attr('src', res.file_path);
        $('#' + id + '_prev').addClass('form-image');
        $('#' + id + '_prev').show();
        $('#' + input).val(res.file_id);
      }

    }
  });
}
 </script>

@endsection