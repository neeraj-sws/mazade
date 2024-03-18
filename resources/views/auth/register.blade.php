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
                              {{-- <option value="both">Both</option> --}}
                           </select>
                        </div>

                        <div id="userFields" style="display: none;">

                           <form class="row g-3" action="{{ route('register.submit') }}" method="POST" onsubmit="event.preventDefault();registerform_submit(this);return false;" enctype="multipart/form-data">

                     
                              <div class="all-form-data row">

                                 <h3 class="inner-form-main-title">User</h3>

                                    <input type="hidden" id="user"  value="1" name="user_id">

                                 <div class="col-md-6">
                                    <input type="text" id="firstName" placeholder="First Name" name="name" >
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" id="lastName" placeholder="Last Name" name="last_name" >
                                 </div>
                                 <div class="col-md-12">
                                    <input type="email" id="email" placeholder="Email" name="email" >
                                 </div>
                                 <div class="col-md-12">
                                    <input type="password" id="password" placeholder="Password" name="password" >
                                 </div>
                                 <div class="col-md-12">
                                    <input type="password" id="confirmPassword" placeholder="Confirm Password" name="comfirm_password" >
                                 </div>
                                 <div class="col-md-12">
                                    <input type="tel" id="phone" name="mobile_number" placeholder="Phone:" >
                                 </div>
                                 <input class="user-submit" type="submit" value="Register">
                                 {{-- <button type="submit" id="sub" class="user-submit">{{ __('Register') }}</button> --}}
                                 <p class="text-center">Have an Account?
                                    <a href="login.html">Login</a>
                                 </p>
                              </div>
                           </form>
                        </div>

                        <div id="companyFields" style="display: none;">
                          

                              <form class="row g-3" action="{{ route('register.companies') }}" method="POST" onsubmit="event.preventDefault();registerform_submit(this);return false;" enctype="multipart/form-data">

                                 <input type="hidden" id="user"  value="2" name="role_id">

                              <div class="all-form-data row">
                                 <h3 class="inner-form-main-title">User</h3>

                                 <input type="hidden" id="user"  value="2" name="user_id">

                                 <div class="col-md-6">
                                    <input type="text" id="firstName" placeholder="First Name" name="firstName" >
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" id="lastName" placeholder="Last Name" name="lastName" >
                                 </div>
                                 <div class="col-md-12">
                                    <input type="email" id="email" placeholder="Email" name="email" >
                                 </div>
                                 <div class="col-md-12">
                                    <input type="password" id="password" placeholder="Password" name="password" >
                                 </div>
                                 <div class="col-md-12">
                                    <input type="password" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword" >
                                 </div>

                                 <div class="col-md-12">
                                    <input type="tel" id="phone" name="phone" placeholder="Phone:"  >
                                 </div>

                                 <h3 class="inner-form-main-title">Company</h3>
                                 <div class="col-md-12">
                                    <input type="text" id="companyName" placeholder="Company Name" name="companyName" >
                                 </div>
                                 <div class="col-md-12">
                                    <input id="address" name="address" placeholder="Address">
                                 </div>

                                 <div class="col-md-12">
                                    <input type="tel" id="phone" name="company_phone" placeholder="Phone">
                                 </div>

                                 <div class="col-md-12">
                                    <input type="text" id="commercialRegister" placeholder="Commercial Register" name="commercialRegister">
                                 </div>
                                 <input class="user-submit" type="submit" value="Register">
                                 {{-- <button type="submit" id="sub" class="user-submit">{{ __('Register') }}</button> --}}
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
            //  document.getElementById("bothFields").style.display = "none";
         
             if (role === "user") {
                 document.getElementById("userFields").style.display = "block";
             } else if (role === "company") {
                 document.getElementById("companyFields").style.display = "block";
            //  } else if (role === "both") {
            //      document.getElementById("bothFields").style.display = "block";
             }
         }

    function registerform_submit(e) {
           
        $(e).find('.st_loader').show();
    $.ajax({
        url: $(e).attr('action'),
        method: "POST",
        dataType: "json",
        data: $(e).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data.status == 1) {
                toastr.success(data.message, 'Success');
                window.location.href = base_url + 'login';
            } else if (data.status == 0) {
            
            var $err = '';
            $.each(data.errors, function (key, value) {
               $err = $err + value + "<br>";
            });
            toastr.error($err, 'Error');
            } else if (data.status === 2) {
               window.setTimeout(function () {
           window.location.href = data.surl;
         }, 1000);

         toastr.success(data.message, 'Success');
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

//  function companiesform_submit(e) {
   
//    toastr.clear();
//    $(e).find('.st_loader').show();
//    $.ajax({
//      url: $(e).attr('action'),
//      method: "POST",
//      dataType: "json",
//      data: $(e).serialize(),
//      success: function (data) {
//     // window.location.reload();
//        if (data.status == 1) {
//         // alert('hii');
//          toastr.success(data.message, 'Success');
//         window.location.href = base_url+'companieslogin.form';
        
//         //  dataTable.draw(false);

//        } else if (data.status == 0) {
 
//          var $err = '';
//          $.each(data.errors, function (key, value) {
//            $err = $err + value + "<br>";
//          });
//          toastr.error($err, 'Error');
//        }
//        else if (data.status == 2) {
         
//          alert('a');

//          toastr.success(data.message, 'Success');
//          window.setTimeout(function () {
//             window.location.href = data.redirect;
//          }, 1000);
//        }
//      },

//      error: function (data) {
//        if (typeof data.responseJSON.status !== 'undefined') {
//          toastr.error(data.responseJSON.error, 'Error');
//        } else {
//          var $err = '';
//          $.each(data.responseJSON.errors, function (key, value) {
//            $err = $err + value + "<br>";
//          });
//          toastr.error($err, 'Error');
//        }
//        $(e).find('.st_loader').hide();
//      }
//    });
//  }

//  function uploadimage(form, url, id, input) 
// {
//   alert(id);
//   $(form).find('.' + id + '_loader').show();
//   $.ajax({
//     type: "POST",
//     url: url + '?type=' + id,
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
//     contentType: false,
//     cache: false,
//     processData: false,
//     dataType: "json",
//     data: new FormData(form[0]),
//     success: function (res) {
//       if (res.status == 0) {
//         $(form).find('.' + id + '_loader').hide();
//         toastr.error(res.msg, 'Error');
//       } else {
//         $(form).find('.' + id + '_loader').hide();
//         $('#' + id + '_prev').attr('src', res.file_path);
//         $('#' + id + '_prev').addClass('form-image');
//         $('#' + id + '_prev').show();
//         $('#' + input).val(res.file_id);
//       }

//     }
//   });
// }
 </script>

@endsection