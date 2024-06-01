@extends('layouts.front')

@section('content')
    <div class="inner-banner">
        <div class="container">
            <h2 class="inner-banner-title  wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s">Categories</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- categories-start -->
    <div id="categories-main">
        <div class="container">
            <div class="row pb-5">
                <div class="category-main-text mt-5">
                    <h2 class="text-center">Categories</h2>
                    <p class="text-center text-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut
                        <br> labore et dolore magna aliqua
                    </p>
                </div>
                <div class="row category-row mt-5">
                    @foreach ($categories as $category)
                        <div class="col-md-2 cate-box-home">
                            @if (Auth::check() && Auth::guard('web')->user()->role == 2)
                                <a href="{{ route('active-auctions', ['categort' =>  $category->id]) }}">
                                    <div style="background-color: #7BAB47;" class="category-main-box">
                                        <div class="category-img">
                                            <img src="{{ asset('uploads/category/' . @$category->photo->file) }}">
                                        </div>
                                        <h5 class="text-white text-16 mb-0">{{ $category->title }}</h5>
                                    </div>
                                </a>
                            @else
                                <a href="{{ url('/new-auction/' . $category->id) }}">
                                    <div style="background-color: #7BAB47;" class="category-main-box">
                                        <div class="category-img">
                                            <img src="{{ asset('uploads/category/' . @$category->photo->file) }}">
                                        </div>
                                        <h5 class="text-white text-16 mb-0">{{ $category->title }}</h5>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- categories-end -->
@endsection
