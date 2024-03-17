@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="dropdown p-5 text-center">
        {{-- <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"  data-mdb-dropdown-init
        data-mdb-ripple-init aria-expanded="false">
            Chose the Role
        </button> --}}
        <button type="button" class="btn btn-outline-primary dropdown-toggle w-25" id="dropdownMenuButton" data-toggle="dropdown" data-mdb-dropdown-init
         aria-expanded="false">
        Choose The Role</button>
        <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton" id="drop">
            <li><a class="dropdown-item fw-bold" href="#" data-target="userForm">User</a></li>
            <li><a class="dropdown-item fw-bold" href="#" data-target="companyForm">Company</a></li>
        </ul>
    </div>
</div>

    <div class="container">
       <div class="userForm" id="userForm" style="display: none;">
          <div class="row justify-content-center">
            <div class="col-md-6">
           <div class="card mt-3">
                      <div class="card-body">
                          <div class="m-2">
                              <div class="d-flex justify-content-center mt-3">
                                  <div class="text-center logo">
                                      <img alt="logo" class="img-fluid" src="{{ asset('assets/images/logo/logo-fold.png') }}" style="height: 70px;">
                                  </div>
                              </div>
                              
                              <div class="text-center mt-3">
                                  <h3 class="fw-bolder">User</h3>
                                  <p class="text-muted mb-5">Register & create your account to continue</p>
                              </div>
      
                                  @if(Session::has('error-message'))
                                      <p class="alert alert-info">{{ Session::get('error-message') }}</p>
                                  @endif

                                  <form class="row g-3" action="{{ route('register.submit') }}" method="POST" onsubmit="event.preventDefault();registerform_submit(this);return false;" enctype="multipart/form-data">
      
                              {{-- <form action="{{ route('register') }}" method="post" id="form1" onsubmit="form_submit(this);return false;"> --}}
                              @csrf
                              <div class="row">
                                <div class="col-md-6">    
                                  <div class="form-group mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="First Name">
                                 </div>
                                </div>
                                <div class="col-md-6">    
                                  <div class="form-group mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                 </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">   
                                  <div class="form-group mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                  </div>
                                </div>
                             
                                <div class="col-md-12"> 
                                  <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                  </div>
                                </div>
                                <div class="col-md-12"> 
                                  <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="comfirm_password" placeholder="Confirm Password">
                                  </div>
                                </div>
                            
                                <div class="col-md-12">
                                  <div class="mb-3">
                                   <label for="name" class="form-label">Phone</label>
                                   <input type="number" class="form-control"  name="mobile_number" placeholder="Phone">
                                  </div>
                                </div>
                            </div>
                              <div class="row justify-content-center">
                              <div class="col-md-10">
                                  <button type="submit" id="sub" class="btn btn-primary w-100">{{ __('Register') }}</button>
                                  
                              </div> 
                              </div>   
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </div>
 

<div  class="companyForm" id="companyForm" style="display: none;">
  <div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card mt-3">
        <div class="card-body">
            <div class="m-2">
                <div class="d-flex justify-content-center mt-3">
                    <div class="text-center logo">
                        <img alt="logo" class="img-fluid" src="{{ asset('assets/images/logo/logo-fold.png') }}" style="height: 70px;">
                    </div>
                </div>
                <div class="text-center mt-3">
                    <h3 class="fw-bolder">Company</h3>
                    <p class="text-muted">Register & create your account to continue</p>
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

                    @if(Session::has('error-message'))
                        <p class="alert alert-info">{{ Session::get('error-message') }}</p>
                    @endif

                    <form method="POST" action="{{ route('register.companies') }}" method="POST" onsubmit="event.preventDefault();companiesform_submit(this);return false;" enctype="multipart/form-data">
                @csrf
                 <div class="row">
                  <div class="col-md-6">    
                    <div class="form-group mb-3">
                      <label class="form-label">Company Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter Name">
                   </div>
                  </div>

                  
                  <div class="col-md-6">
                    <div class="mb-3">
                     <label class="form-label">Phone</label>
                     <input type="number" class="form-control" name="mobile_number" placeholder="Enter Number">
                    </div>
                  </div>
                 </div>
               

                <div class="col-md-12">
                    <div class="mb-3">
                     <label class="form-label">Email</label>
                     <input type="email" class="form-control" name="email" placeholder="Enter Emial">
                    </div>
                  </div>
                 

                
                  <div class="col-md-12"> 
                    <div class="mb-3">
                      <label class="form-label">Address</label>
                      <textarea type="text" class="form-control" name="address" placeholder="Enter Address"></textarea>
                    </div>
                 </div>
                 

                <div class="col-md-12">
                    <div class="mb-3">
                     <label class="form-label">Password</label>
                     <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div>
                  </div>
                 

                 <div class="col-md-12">
                    <div class="mb-3">
                     <label class="form-label">Confirm Password</label>
                     <input type="password" class="form-control" name="comfirm_password" placeholder="Enter Confirm Password">
                    </div>
                  </div>
                 
                  <div class="row mt-2 mb-3">
                    <div class="col-md-10">
                        <label for="Outletname" class="form-label">Commerical Register</label>
                        <div class="custom-file">
                            <input type="hidden" name="image_path" value="uploads/services/">
                            <input type="hidden" name="image_name" value="image">
                            <input accept="application/pdf" type="file" class="custom-file form-control" name="image"
                                onchange="uploadimage($(form),'{{ route('saveimage') }}','image','file_id');return false;"
                                accept=".jpg,.jpeg,.png">
                            <input type="hidden" name="file_id" id="file_id" value="">
                            <i class="image_loader fa-btn-loader fa fa-refresh fa-spin fa-1x fa-fw"
                                style="display:none;"></i>
                            <label id="lblErrorMessageBannerImage" style="color:red"></label>
                        </div>
                    </div>
                    <div class="col-md-2 mt-3">
                        <img src="" id="image_prev" class="img-thumbnail " alt="" width="100" height="100"
                            style="display:none">
                        <label id="lblErrorMessageBannerImage" style="color:red"></label>
                    </div>
                </div>

                <div class="row justify-content-center">
                <div class="col-md-10">
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </div> 
                </div>   
                </form>
            </div>
        </div>
    </div>
</div>
  </div>
</div>

<div class="row justify-content-center">
 
</div>
</div>
@endsection
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