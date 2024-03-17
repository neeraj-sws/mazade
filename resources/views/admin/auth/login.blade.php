<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.ico">

    <!-- page css -->

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    
     @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div class="auth-full-height d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-2">
                                <div class="d-flex justify-content-center mt-3">
                                    <div class="text-center logo">
                                        <img alt="logo" class="img-fluid" src="assets/images/logo/logo-fold.png" style="height: 70px;">
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <h3 class="fw-bolder">Sign In</h3>
                                    <p class="text-muted">Sign in your account to continue</p>
                                </div>
                               

                                    @if(Session::has('error-message'))
                                        <p class="alert alert-info">{{ Session::get('error-message') }}</p>
                                    @endif

                                <form class="row g-3" action="{{ route('admin.login.functionality') }}" method="POST" onsubmit="event.preventDefault();adminLogin_submit(this);return false;" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email" class="form-control" name="email" placeholder="Enter Email" value="admin@gmail.com" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-flex justify-content-between">
                                            <span>Password</span>
                                            <!-- <a href="" class="text-primary font">Forget Password?</a> -->
                                        </label>
                                        <div class="form-group input-affix flex-column">
                                            <label class="d-none">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password" value="123123">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Log In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>
<script src="{{asset('admin/assets/js/crud.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('admin/assets/vendors/toastr/toastr.min.js') }}"></script>
<script>
    function adminLogin_submit(e) {
    toastr.clear();
   $(e).find('.st_loader').show();
   $.ajax({
     url: $(e).attr('action'),
     method: "POST",
     dataType: "json",
     data: $(e).serialize(),
     success: function (data) {
        
       if (data.status == 1) {
        // alert('hii');
         toastr.success(data.message, 'Success');
        window.location.href = base_url+'admin.dashboard';
        
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
 </script>