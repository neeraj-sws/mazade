@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="d-flex justify-content-around">
                <table class="table table-bordered border-primary">
                    <thead>
                        <th>ID Order</th>
                        <th>Category Name</th>  
                        <th>Company Name</th>
                        <th>Current Price</th>
                        <th>Cancel</th>
                        <th>Proceed to payment</th>
                    </thead>
                    <tbody>
                      @foreach ($auction as $auctions)
                      <tr class="table-active">
                        <th scope="row"> {{ $auctions->id }}</th>
                        <th>{{ $auctions->CatId->title }}</th>
                        <th>{{ $auctions->companyId->name }}</th>
                        <td >{{ $auctions->price }}</td>
                          <td>
                              <a href="{{ route('home') }}"  class="btn btn-primary">Cancel</a>   
                          </td>
                          <td>   
                            <form class="row g-3"  action="payments"  method="POST">
                                @csrf

                                <input type="hidden" name="category_id" value="{{ $auctions->category_id }}" class="form-control" />

                                <input type="hidden" name="user_id" value="{{ $user->id }}" class="form-control" />

                                <input type="hidden" name="auction_id" value="{{ $auctions->auction_id }}" class="form-control" />

                                <input type="hidden" name="amount" value="{{ $auctions->price }}" class="form-control" />

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Proceed to payment</button>
                                </div>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
@endsection
