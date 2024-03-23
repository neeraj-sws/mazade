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
            <div id="main-bid-list-new" class="bid-list">
            </div>
        </div>
    </div>
</div>


@endsection


@section('page-js-script')

<script>

    $(document).ready(function() {
      
        action_data();
        categories_filter();

        $('#filterForm').submit(function(event) {
            event.preventDefault(); 
            action_filter(); 
        });
    });
    
        // Loop through each row and calculate countdown for each end time
    function action_data() {
     
        $.ajax({
                'headers': {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('active-auctions_list') }}",
                method: "POST",
                dataType: "JSON",
                data: {},
                success: function (res) {
                $("#main-bid-list-new").html(res.view)
    
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
             success: function (res) {
             $("#categories_filter").html(res.view)
 
             }
         });
    
 }

 function action_filter() {
        var formData = $('#searchInput').serialize(); 
       
        $.ajax({
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('auctions_filter') }}",
            method: "POST",
            dataType: "JSON",
            data: formData, 
            success: function (res) {
                $("#main-bid-list-new").html(res.view);
            }
        });
    }

    
        </script>
    @endsection
