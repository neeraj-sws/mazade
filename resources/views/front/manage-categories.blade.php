@extends('layouts.front')

@section('content')
    <div class="inner-banner">
        <div class="container">
            <h2 class="inner-banner-title  wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s">Categories</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Categories</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- categories-start -->
    <div id="categories-main">
        <div class="container">
            <div class="category-main-text mt-5">
                <h2 class="text-center">Manage Categories</h2>
                <p class="text-center text-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut
                    <br> labore et dolore magna aliqua
                </p>
            </div>
            <div class="row pb-5">
                <div class="col-md-3">
                    <div class="sidebar w-100 py-3" id="categories_filter">
                        <div class="main-cat-title">
                            <h2 class="main-cat-title-inner">Select Categories</h2>
                        </div>
                        <div class="cat-main-1212">
                            <div class="category-list">
                                @foreach ($allCategories as $allCategory)
                                    <div class="category">
                                        <input onchange="favCategory(this)" type="checkbox" name="cat_id[]"
                                            value="{{ $allCategory->id }}" id="category{{ $allCategory->id }}"
                                            class="category-checkbox" @checked(!empty($allCategory->sellerCategory))>
                                        <label for="category{{ $allCategory->id }}"
                                            class="category-label">{{ $allCategory->title }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row category-row mt-5 sortable-category" id="category-box">
                        @foreach ($favCategories as $category)
                            <div class="col-md-3 cate-box-home" data-id="{{ $category->id }}">
                                <a href="javascript:void(0);" title="Drag for order change" >
                                    <div style="background-color: #7BAB47;" class="category-main-box">
                                        <div class="category-img">
                                            <img src="{{ asset('uploads/category/' . @$category->category->photo->file) }}">
                                        </div>
                                        <h5 class="text-white text-16 mb-0">{{ $category->category->title }}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- categories-end -->
@endsection
@section('page-js-script')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script>
        $(function() {
            $(".sortable-category").sortable({
                update: function(event, ui) {
                    //   var order = $(this).sortable('toArray');
                    var order = $(this).sortable('toArray', {
                        attribute: 'data-id'
                    });
                    updateOrder(order);
                }
            });
        });

        function updateOrder(order) {
            $.ajax({
                url: '{{ route('manage.update-order') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    order: order
                },
                success: function(response) {
                    toastr.success('Category order successfully changed.', 'Success');
                },
                error: function(xhr, status, error) {
                  toastr.success(error, 'error');
                }
            });
        }

        function favCategory(e) {

            if ($(e).prop('checked')) {
                $add = 1;
            } else {
                $add = 0;
            }

            $.ajax({
                url: '{{ route('manage.categories.store') }}',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                data: {
                    id: $(e).val(),
                    add: $add,
                },
                success: function(data) {
                    if (data.code == 1) {
                        $('#category-box').html(data.html);
                        toastr.success(data.msg, 'Success');
                    } else {
                        toastr.success('Something wrong found! Please try again.', 'Success');
                    }
                },
                error: function(data) {
                    if (typeof data.responseJSON.status !== 'undefined') {
                        toastr.error(data.responseJSON.error, 'Error');
                    } else {
                        var $err = '';
                        $.each(data.responseJSON.errors, function(key, value) {
                            $err = $err + value + "<br>";
                        });
                        toastr.error($err, 'Error');
                    }

                }
            });
        }
    </script>
@endsection
