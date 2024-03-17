@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="m-2">
                    <div class="d-flex justify-content-center mt-3">
                        <div class="text-center logo">
                            <img alt="logo" class="img-fluid" src="{{ asset('assets/images/logo/logo-fold.png') }}" style="height: 70px;">
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <h3 class="fw-bolder">User</h3>
                        <p class="text-muted">Login your account to continue</p>
                    </div>
                        {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                        @endif --}}

                        {{-- @if(Session::has('error-message'))
                            <p class="alert alert-info">{{ Session::get('error-message') }}</p>
                        @endif --}}
                        <form class="row g-3" action="{{ route('submit.login') }}" method="POST" onsubmit="event.preventDefault();loginform_submit(this);return false;" enctype="multipart/form-data">
    
                    @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" class="form-control" name="email" placeholder="Enter Email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-flex justify-content-between">
                                <span>Password</span>
                                <!-- <a href="" class="text-primary font">Forget Password?</a> -->
                            </label>
                            <div class="form-group input-affix flex-column">
                                <label class="d-none">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                            </div>
                        </div>

                        <div class="mb-3">
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                             <label class="form-check-label" for="remember">
                             {{ __('Remember Me') }}
                             </label>
                           </div>
                        </div>
                   

                        <div class="row justify-content-center">
                        <div class="col-md-10">    
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

<script>
    function loginform_submit(e) {
   
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
        window.location.href = base_url+'home';
        
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
