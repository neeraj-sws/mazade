@extends('companies.layouts.add')
@section('content')
 
        <div class="container">
          
            <div class="mb-3 border p-3" style="width: max-content;">
                <h4>{{ @$company->name }}</h4>
            </div>

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
                      <th>Status</th>
                      <th>Details</th>
                    </thead>
                    <tbody>
                      @foreach ($startauctions as $start)
                      <tr class="table-active">
                        <th scope="row"> {{ $start->oder_id }}</th>
                        <td>{{ $start->CatId->title }}</td>
                       <td >{{ $start->budget }}</td>
                        <td>{{ date_format($start->created_at,"h:i:s") }}</td>
                        <td >{{ $start->status_id->name }}</td>
                        <td>
                          @if($start->status == 1)
                          <a href="javascript:void(0);" class="btn btn-primary" onclick="edit_row('{{ route('detaills', ['id' => $start->id]) }}');">Bid Add</a>
                          @else
                          <a href="#"  class="btn btn-primary">Company Already Bit</a>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
      </div>
@endsection
