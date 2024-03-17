@extends('layouts.app')

@section('content')

<div class="container">
  

    <div class="row justify-content-center">
        <h5 class="justify-content-center mb-5" style="text-align: center;">{{$sub_categories->title }}</h5>
        <div class="col-md-8"> 

              
                <form class="row g-3" action="{{ route('sub_category.store') }}"  onsubmit="event.preventDefault();auctionSubmit(this);return false;"  method="POST">
                  {{-- <form class="row g-3" action="{{ route('sub_category.store') }}"  method="POST"> --}}
                    @csrf
              
                <div class="row form-outline mb-4">
                  <div class="col">
                    <div data-mdb-input-init class="form-outline">
                         <label class="form-label" for="sub_category_input">Category Name</label>
                        <input type="text"  value="{{ $sub_categories->CatId->title }}" placeholder="{{ $sub_categories->CatId->title }}" id="sub_category_input" class="form-control" disabled/>

                        <input type="hidden" name="category" class="form-control" value="{{ $sub_categories->category_id }}">
                         
                    </div>
                </div>

                  <div class="col">
                    <div data-mdb-input-init class="form-outline">
                         <label class="form-label" for="form6Example2">Sub-Category Name</label>
                      <input type="text"  value="{{ $sub_categories->title }}" placeholder="{{$sub_categories->title }}" id="" class="form-control"  disabled/>
                      <input type="hidden" name="sub_category" class="form-control" value="{{ $sub_categories->id }}">
                     
                    </div>
                  </div>
                </div>



                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form6Example4">Name</label>
               <input type="text" id="form6Example4" name="name" class="form-control"/>
             </div>
              
              
                <div data-mdb-input-init class="form-outline mb-4">
                     <label class="form-label" for="form6Example3">Quality</label>
                    <select class="form-select select2" name="Quality">
                    <option value="">Select Quality ..  </option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                    </select>
                   
                </div>
              
              
                <div data-mdb-input-init class="form-outline mb-4">
                     <label class="form-label" for="form6Example4">Budget</label>
                  <input type="number" id="form6Example4" name="Bugiet" class="form-control"/>
                </div>
              
               
                <div data-mdb-input-init class="form-outline mb-4">
                     <label class="form-label" for="form6Example5">City</label>
                  <select class="form-select" name="city">
                    <option value=""> Select City ... </option>
                    @foreach($city as $citys)
                    <option value="{{ $citys->id }}"> {{ $citys->name }} </option>
                    @endforeach
                 </select>
                </div>

               
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form6Example6">Quantity</label>
                  <input type="number" id="form6Example6" min="1" name="quantity" value="1" class="form-control" />
                </div>

                <div class="row mt-2">
                  <div class="col-md-10">
                      <label for="Outletname" class="form-label">Icon</label>
                      <div class="custom-file">
                          <input type="hidden" name="image_path" value="uploads/category/">
                          <input type="hidden" name="image_name" value="image">
                          <input type="file" class="custom-file form-control" name="image"
                              onchange="upload_image($(form),'{{ route('imageuplode') }}','image','image');return false;"
                              accept=".jpg,.jpeg,.png">
                          <input type="hidden" name="image" id="image" value="">
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
              
              
                <div data-mdb-input-init class="form-outline mb-4">
                     <label class="form-label" for="form6Example7">Description</label>
                  <textarea class="form-control" id="form6Example7" name="description" rows="4"></textarea>
                </div>
              
              
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Start Auction</button>
            </div>
              </form>
          

        </div>
    </div>
</div>
@endsection
<script>
function auctionSubmit(e) {
    toastr.clear();
    $(e).find('.st_loader').show();
    $.ajax({
        url: $(e).attr('action'),
        method: "POST",
        dataType: "json",
        data: $(e).serialize(),
        success: function (data) {
            if (data.status == 1) {
                toastr.success(data.message, 'Success');
                $(e).find('.st_loader').hide();
                $(e)[0].reset();
                $('#modal-lg').modal('hide');
                $('#modal-lg .modal-content').html('');
                
                // Redirect to the home page
                window.location.href = "/home";
            } else if (data.status == 0) {
                var $err = '';
                $.each(data.errors, function (key, value) {
                    $err = $err + value + "<br>";
                });
                toastr.error($err, 'Error');
                $(e).find('.st_loader').hide();
            } else if (data.status == 2) {
                toastr.success(data.message, 'Success');
                window.setTimeout(function () {
                    window.location.href = data.surl;
                }, 1000);
                $(e).find('.st_loader').hide();
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
