@extends('companies.layouts.add')
@section('content')
 
        <div class="container">
          
            <div class="mb-3 border p-3" style="width: max-content;">
                <h4>Active Auction</h4>
            </div>

            <div class="d-flex justify-content-around">
                <table class="table table-bordered border-primary">
                    <thead>
                      <th>Id Order</th>
                      <th>Category Name</th>
                      <th>Budget</th>
                      <th>Time Remaining</th>
                      <th>Last Price</th>
                      <th>Update</th>
                    </thead>
                    <tbody>
                      @foreach ($info as $start)
                      <tr class="table-active">
                        <th scope="row"> {{ $start->id }}</th>
                        <td>{{ $start->CatId->title }}</td>
                       <td >{{ $start->AuId->budget }}</td>
                        <td>{{ date_format($start->AuId->created_at,"h:i:s") }}</td>
                        <td >{{ $start->price }}</td>
                        <td>
                          <a href="{{ route('auctionupdate' , $start->id) }}" class="btn btn-primary">Update</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
      </div>
@endsection