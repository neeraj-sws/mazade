
@extends('companies.layouts.add')
@section('content')
 
        <div class="container">
          <h4>Active Auction</h4>
            <div class="d-flex justify-content-around">
                <table class="table table-bordered border-primary">
                    <thead>
                        <th>Id Order</th>
                        <th>Category Name</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Code</th>
                    </thead>
                    <tbody>
                      @foreach ($startauction as $start)
                      <tr class="table-active">
                        <th scope="row"> {{ $start->AuId->oder_id }}</th>
                        <td>{{ $start->CatId->title }}</td> 
                        <td>{{ $start->AuId->name }}</td> 
                        <td >{{ $start->price }}</td>
                        <td>{{  date('d F Y', strtotime($start->created_at)) }}</td>
                        <td>{{ $start->AuId->status }}</td>
                        
                          <td>
                            @if($start->status == '0')
                              {{-- <a href="{{ route('auctioncode', $start->id) }}" class="btn btn-primary">code</a> --}}
                              <a href="javascript:void(0);" class="btn btn-primary" onclick="edit_row('{{ route('auctioncode', ['id' => $start->id]) }}');">Code</a>
                            @else
                            <a href="#" class="btn btn-primary">Company Already Accept</a>
                              @endif
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  
            </div>
      </div>
@endsection
