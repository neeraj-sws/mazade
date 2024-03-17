@extends('layouts.app')

@section('content')



        <div class="container">
          <div class="row justify-content-around">
              
                <p class="justify-content-center" style="text-align: center;">{{ $category->CatId->title }}</p>
              
              @foreach($sub_categories as $category)
             <div class="card justify-content-center" style="width: 15rem;align-items: center; padding-top: 20px;">
                
                      <img src="{{ asset('uploads/services/'.@$category->photo->file) }}" class="card-img-top" alt="..." style="width:30%">
                      <div class="card-body">
                           <a href="{{ route('sub.category' , $category->slug) }}" class="btn btn">
                          <h5 class="card-title">{{ $category->title }}</h5>
                         </a>
                     
                  </div>
              </div>
              @endforeach
          </div>
      </div>
      
@endsection