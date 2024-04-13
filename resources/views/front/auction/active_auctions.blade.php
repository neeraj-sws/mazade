@extends('layouts.front')

@section('content')
    <div class="inner-banner">
        <div class="container">
            <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Active Auctions </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Active Auctions</li>
                </ol>
            </nav>
        </div>
    </div>

    <div id="category-select">
        <div class="container">
            <div class="row">
                <div class="sidebar" id="categories_filter">
                </div>
                @if ($type == 'grid')
                    <div class="bid-list" id="category_detail">
                    </div>
                @else
                    <div id="main-bid-list-new" class="bid-list">
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection


@section('page-js-script')
    <script>
        $(document).ready(function() {

            action_data();
            categories_filter();
            category_detail();

            $('#filterForm').submit(function(event) {
                event.preventDefault();
                action_filter();

            });
        });

        // Loop through each row and calculate countdown for each end time
        function action_data() {

            var formData = $('#filterForm').serialize();

            console.log(formData);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('active-auctions_list') }}",
                method: "POST",
                dataType: "JSON",
                data: formData, // Use formData as the data for the AJAX request
                success: function(res) {
                    $("#main-bid-list-new").html(res.view);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function category_detail() {
            //  alert();
            $.ajax({
                'headers': {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('category-detail') }}",
                //  method: "POST",           
                data: {},
                success: function(res) {
                    $("#category_detail").html(res)
                }
            });
        }

        function categories_filter() {

            $.ajax({
                'headers': {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('categories-auctions_filter') }}",
                method: "POST",
                dataType: "JSON",
                data: {},
                success: function(res) {
                    $("#categories_filter").html(res.view)
                }
            });

        }
        function action_filter() {
            var formData = $('#filterForm').serialize();

            $.ajax({
                'headers': {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('auctions_filter') }}",
                method: "POST",
                dataType: "JSON",
                data: formData,
                success: function(res) {
                    $("#main-bid-list-new").html(res.view);
                }
            });
        }


        function changelist(val) {
            $('#list_type').val(val)
            action_data();

    }

 
    
        </script>
    @endsection

