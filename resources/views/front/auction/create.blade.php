@extends('layouts.auction')
@section('page-css-script')

<style type="text/css">
      .category-box {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .check-icon {
        position: absolute;
        top: 5px;
        right: 5px;
        color: green;
        display: none;
    }

    .selected {
        background-color: #0163d3;
    }

    .selected .check-icon {
        display: block;
    }
    .selected .cat-icon svg , .selected h5 {
      fill: #fff!important;
      color: #fff!important;
    }
    .subcategories {
        display: none;
        padding-left: 20px;
    }

    .sub-category-box {
        margin-left: 20px;
        
    }

    .show {
        display: block;
    }
    .selected-sub-category {
    background-color: #0163d3;
    }
   

   </style>
@endsection
@section('content')
<div class="login-section pt-40 pb-120">
      <img alt="imges" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
      <img alt="imges" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
      <div class="container">
      <div class="row d-flex justify-content-center g-4">
      <div class="col-xl-9 col-lg-8 col-md-10">
      <div class="form-wrapper wow fadeInUp form-wrapper-new-2" data-wow-duration="1.5s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInUp;">



<div id="category-topp">
            <div class="category-main-text mb-5">
                  <h2>@if($cat_id == 0 AND $sub_cat_id == 0) Select @endif Category</h2>
               </div>
      </div>

      <div class="category-section">
   <div class="position-relative">
   @if($cat_id != 0 AND $sub_cat_id != 0)
      <div class="swiper-slide">
               <a href="{{ url('/new-auction/'.$cat_info->id)}}" class="text-decoration-none">
                  <div class="category-box eg-card category-card1 wow animate fadeInDown  selected"   data-wow-duration="1500ms" data-wow-delay="200ms">
                     <div class="cat-icon">
                     <img src="{{ asset('uploads/category/'.@$cat_info->photo->file) }}">
                     </div>
                        <h5>{{ $cat_info->title }}</h5>
                  </div>
               </a>
               </div>
               @else 
      <div class="row d-flex justify-content-center">
             
         <div class="swiper category1-slider">
            <div class="swiper-wrapper">
           
        
            @foreach($categories as $category)
               <div class="swiper-slide">
               <a href="{{ url('/new-auction/'.$category->id)}}" class="text-decoration-none">
                  <div class="category-box eg-card category-card1 wow animate fadeInDown  @if($category->id == $cat_id) selected @endif"   data-wow-duration="1500ms" data-wow-delay="200ms">
                     <div class="cat-icon">
                     <img src="{{ asset('uploads/category/'.@$category->photo->file) }}">
                     </div>
                        <h5>{{ $category->title }}</h5>
                  </div>
               </a>
               </div>
            @endforeach   
           
            
             
            </div>
         </div>
        
      </div>
      <div class="slider-arrows text-center d-xl-flex d-none  justify-content-end">
         <div class="category-prev1 swiper-prev-arrow" tabindex="0" role="button" aria-label="Previous slide"> <i class="bx bx-chevron-left"></i> </div>
         <div class="category-next1 swiper-next-arrow" tabindex="0" role="button" aria-label="Next slide"> <i class="bx bx-chevron-right"></i></div>
      </div>
      @endif  
   </div>
</div>

   <input type="hidden" id="selected-category">
    <input type="hidden" id="selected-sub-category">



      <!-- categories-strat -->

    @if($sub_categories)
      <div id="down-sub">
         <div class="5656">
            <div class="row">
               <div class="sub-category-box" id="design-subcategories">
                    <div class="category-main-text">
                  <h2 class="mt-5"> @if($cat_id == 0 AND $sub_cat_id == 0) Select @endif Sub Categories</h2>
               </div>
               <div class="row user-category-main mt-4 g-3">
               @if($cat_id != 0 AND $sub_cat_id != 0)
               <div class="col-md-2">
                  <a href="{{ url('/new-auction/'.$cat_id.'/'.$sub_cat_info->id)}}"class="text-decoration-none">
                        <div class="row sub-category category-box eg-card category-card1 wow animate fadeInDown selected" onclick="selectSubCategory(this)">
                           
                     <div class="cat-icon">
                           <img src="{{ asset('uploads/services/'.@$sub_cat_info->photo->file) }}">
                     </div>
                        <h5>{{ $sub_cat_info->title }}</h5>
                        </div>
                     </a>
                  </div>
               @else
                  @foreach($sub_categories as $sub_category)
                  <div class="col-md-2">
                  <a href="{{ url('/new-auction/'.$cat_id.'/'.$sub_category->id)}}"class="text-decoration-none">
                        <div class="row sub-category category-box eg-card category-card1 wow animate fadeInDown @if($sub_category->id == $sub_cat_id) selected @endif" onclick="selectSubCategory(this)">
                           
                     <div class="cat-icon">
                           <img src="{{ asset('uploads/services/'.@$sub_category->photo->file) }}">
                     </div>
                        <h5>{{ $sub_category->title }}</h5>
                        </div>
                     </a>
                  </div>
                  @endforeach
                 @endif
               </div>
                </div>
            </div>
         </div>
      </div>

    @endif


    @if($cat_id AND $sub_cat_id)
      <div id="bottom-form">
         <div class="signup-section pb-30">
            <div id="category-topp">
         <div>
         </div>
      </div>
            <div class="row d-flex justify-content-center">
<div class="col-xl-11 col-lg-11 col-md-11">
<div class="form-wrapper wow fadeInUp register-top-slider mt-5" data-wow-duration="1.5s" data-wow-delay=".2s">

<div class="register-main">
            <!-- <h2>Real Estate</h2> -->
              <div id="userFields">
                   <form action="{{ route('auction.store') }}" onsubmit="event.preventDefault();form_submit(this);return false;"  method="POST">
                   @csrf
                   <input type="hidden" name="category" class="form-control" value="{{ $cat_id }}">
                   <input type="hidden" name="sub_category" class="form-control" value="{{ $sub_cat_id }}">
                    <div class="all-form-data row">
                    <div class="col-md-12">
                    <input type="text" id="title" placeholder="Title" name="title" >
                    </div>

                         <div class=" d-flex flex-column">
              
                          <select name="quality" class="form-select" >
                              <option value="" disabled selected>Quality</option>
                              <option value="0">High</option>
                              <option value="1">Medium</option>
                              <option value="2">Low</option>
                          </select>
                       </div>
                      
                    <div class="col-md-12">
                    <input type="number" id="budget" placeholder="Budget" name="budget" >
                    </div>

                   
                       <div class="d-flex flex-column">
                            <select name="city" class="form-select" id="select2">
                                <option value="" disabled selected>City</option>
                                  @foreach ($city as $citys)
                                <option value="{{ $citys->id }}">{{ $citys->name }}</option>
                                @endforeach
                           
                            </select>
                        </div>
                      @php 
                      
                     $current = \Carbon\Carbon::now();
                     $tomorrow = \Carbon\Carbon::now()->addHours(24);


                    @endphp 
                <div class="col-md-12">
                    <label>Start Time</label>
                    <input type="text" id="birthdaytime" placeholder="start time" name="start_time" value="{{ $current }}">
                </div>

                <div class="col-md-12">
                    <label>End Time</label>
                    <input type="text" id="birthdaytime" placeholder="last time" name="end_time" value="{{ $tomorrow }}">
                </div>
        

                    <div class="col-md-12">
                        <div class="col-md-10">
                            <label>Upload Images(Optional)</label>
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
                    

                     <div class=" d-flex flex-column">
              
                          <select  name="quantity" class="form-select" >
                              <option value="" disabled selected>Choose the Quantity</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                          </select>
                       </div>

                    <div class="col-md-12">
                    <textarea id="message" name="message" rows="4" placeholder="Description" cols="50"></textarea>
                    </div>

                    <div class="col-md-agree">

                    <label>
                      <input type="checkbox" name="terms" value="agree" >
                      I agree to the <a href="terms_and_conditions.html" target="_blank">Terms and Conditions</a>
                    </label>
                    </div>


                   <input class="user-submit" type="submit" value="Start Auction">
                    </div>
                </form>
              </div>
          </div>

</div>
</div>
</div>
        </div>
    </div>
    @endif


</div>
</div>
</div>
</div>
</div>

@endsection


@section('page-js-script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>

      $('#select2').select2();

        function selectBox(box, category) {
            var boxes = document.querySelectorAll('.category-box');
            boxes.forEach(function(item) {
                item.classList.remove('selected');
            });
            box.classList.add('selected');
            document.getElementById('selected-category').value = category;

            var subcategories = document.querySelectorAll('.sub-category-box');
            subcategories.forEach(function(item) {
                item.style.display = 'none';
            });

            var selectedSubcategories = document.getElementById(category + '-subcategories');
            selectedSubcategories.style.display = 'block';
        }

        function selectSubCategory(subCategory) {
            var subCategories = document.querySelectorAll('.sub-category');
            subCategories.forEach(function(item) {
                item.classList.remove('selected-sub-category');
            });
            subCategory.classList.add('selected-sub-category');
            document.getElementById('selected-sub-category').value = subCategory.innerText;

            document.getElementById('bottom-form').style.display = 'block';
            document.getElementById('selected-subcategory-text').innerText = subCategory.innerText;
        }
    </script>


    <script>
        const fileInput = document.getElementById('file-input');
        const fileList = document.getElementById('file-list');

        fileInput.addEventListener('change', function() {
            Array.from(fileInput.files).forEach(file => {
                const fileItem = document.createElement('div');
                fileItem.classList.add('file-item');

                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);

                const cutButton = document.createElement('button');
                cutButton.innerHTML = '&#x1f5d1;'; // Cut icon (scissors)
                cutButton.addEventListener('click', function() {
                    fileList.removeChild(fileItem);
                    updateFileInput();
                });

                fileItem.appendChild(img);
                fileItem.appendChild(cutButton);
                fileList.appendChild(fileItem);
            });
        });

        function updateFileInput() {
            const files = Array.from(fileList.children).map(fileItem => {
                const imgSrc = fileItem.querySelector('img').src;
                return dataURLtoFile(imgSrc);
            });
            fileInput.files = new FileList(files);
        }

        function dataURLtoFile(dataurl) {
            const arr = dataurl.split(',');
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);
            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new File([u8arr], 'image.png', { type: mime });
        }
    </script>


<script>

  
    

function auctionSubmit(e) {
 
    //toastr.clear();
    $(e).find('.st_loader').show();
    $.ajax({
        url: $(e).attr('action'),
        method: "POST",
        dataType: "json",
        data: $(e).serialize(),
        success: function (data) {
            if (data.status == 1) {
               // toastr.success(data.message, 'Success');
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
               // toastr.error($err, 'Error');
                $(e).find('.st_loader').hide();
            } else if (data.status == 2) {
              //  toastr.success(data.message, 'Success');
                window.setTimeout(function () {
                    window.location.href = data.surl;
                }, 1000);
                $(e).find('.st_loader').hide();
            }
        },
        error: function (data) {
            if (typeof data.responseJSON.status !== 'undefined') {
               // toastr.error(data.responseJSON.error, 'Error');
            } else {
                var $err = '';
                $.each(data.responseJSON.errors, function (key, value) {
                    $err = $err + value + "<br>";
                });
              //  toastr.error($err, 'Error');
            }
            $(e).find('.st_loader').hide();
        }
    });
}
  </script>
@endsection
