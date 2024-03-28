@extends("admin.layouts.app")

@section("wrapper")
     <!-- Content START -->
     <div class="content">
                <div class="main">
                    <div class="row">

                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                <a href="{{route('admin.companie.companie')}}">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                        <span class="text-muted fw-semibold">Total</span>
                                            <h4 >Companie's</h4>
                                        </div>
                                        <div class="text-dark fw-bold font-size-lg">{{$companies}}</div>
                                    </div>
                                    </a>
                                    <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                                </div>
                            </div>  
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                <a href="{{route('admin.customer.user')}}">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                        <span class="text-muted fw-semibold">Total</span>
                                            <h4>Customer</h4>
                                        </div>
                                        <div class="text-dark fw-bold font-size-lg">{{ $customer }}</div>
                                    </div>
                                    </a>
                                    <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                                </div>
                            </div>  
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                <a href="{{route('admin.category.category')}}">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                        <span class="text-muted fw-semibold">Total</span>
                                            <h4>Category</h4>
                                        </div>
                                        <div class="text-dark fw-bold font-size-lg">{{ $categorys }}</div>
                                    </div>
                                    </a>
                                    <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                                </div>
                            </div>  
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                <a href="{{route('admin.sub_category.sub_category')}}">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                        <span class="text-muted fw-semibold">Total</span>
                                            <h4>Sub Category</h4>
                                        </div>
                                        <div class="text-dark fw-bold font-size-lg">{{ $sub_category }}</div>
                                    </div>
                                    </a>
                                    <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                                </div>
                            </div>  
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                <a href="{{route('admin.transaction.transaction')}}">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                        <span class="text-muted fw-semibold">Total</span>
                                            <h4>Transaction</h4>
                                        </div>
                                        <div class="text-dark fw-bold font-size-lg">{{ $city }}</div>
                                    </div>
                                    </a>
                                    <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                                </div>
                            </div>  
                        </div>

                    </div>
                    
                </div>

        
            <!-- Content END -->

@endsection  
