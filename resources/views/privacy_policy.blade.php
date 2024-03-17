@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ __('Privacy Policy') }}</h3></div>

                <div class="card-body">
                    {!!$product->description!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
