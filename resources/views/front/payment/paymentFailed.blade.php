@extends('layouts.auction')
@section('content')
    <div id="payment-main">
        <div class="container">
            <div class="payment-box-shadow">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center mt-5">
                        <h1>Please Wait</h1>
                        <p class="lead">Payment is processing...</p>
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3">Please try again after some time.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js-script')
    @if (isset($success) && $success == 'success')
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    window.location.replace("{{ route('last-bidings') }}");
                }, 5000);
            });
        </script>
    @endif
@endsection