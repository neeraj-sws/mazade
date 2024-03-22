@extends('layouts.app')
@section('content')
        <div class="container">
           
            <div class="card">
              <div class="card-body">
                  <div class="d-flex ">
                      <h4>Order Status</h4>
                      <div class="ms-auto">
                          <div class="btn-group">
                              <a href="{{ route('categoryshow') }}" class="btn btn-primary"><i class="bx bxs-plus-square"></i>New Auction</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

            <div class="d-flex justify-content-around">
                <table class="table table-bordered border-primary">
                    <thead>
                        <th>ID Order</th>
                        <th>Category Name</th>  
                        <th>Budget</th>
                        <th>Time</th>
                        <th>Current Price</th>
                        <th>Cancel</th>
                        <th>End Auction</th>
                    </thead>
                    <tbody>
                      @foreach ($oders as $oder)
                      <tr class="table-active">
                        <th scope="row"> {{ $oder->id }}</th>
                        <th>{{ $oder->CatId->title }}</th>
                        <th>{{ $oder->AuId->budget }}</th>
                        <td>{{ date_format($oder->created_at,"h:i:s") }}</td>
                        <td >{{ $oder->price }}</td>
                        @if($oder->is_cancel == 0 && $oder->is_auction == 0)
                          <td>
                              <a href="{{ route('cancelauction' , $oder->id) }}"  class="btn btn-primary">Cancel</a>   
                          </td>
                          <td>   
                            <form class="row g-3"action="{{ route('finishedauction') }}"  method="POST">
                                @csrf
                              <input type="hidden" name="category_id" value="{{ $oder->category_id }}" class="form-control" />
                              <input type="hidden" name="company_id" value="{{ $oder->company_id }}" class="form-control" />
                              <input type="hidden" name="username" value="{{ $user->id }}" class="form-control" />
                              <input type="hidden" name="Paid" value="{{ $oder->price }}" class="form-control" />
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                               
                                    <button type="submit"  onclick="is_cancel('{{ route('companie_finished') }}','1', {{ $oder->id }})" class="btn btn-primary">End Auction</button>
                                  </div>
                          </form>
                        </td>
                        @else
                        <td>
                           @if ($oder->is_cancel == 1)
                           <a href="#"  class="btn btn-primary">Already Cancel</a> 
                           @endif
                    </td>
                    <td>
                        @if ($oder->is_auction == 1)
                        <a href="#"  class="btn btn-primary">Already End Auction</a> 
                        @endif
                    </td>
                        @endif

                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
@endsection
<script>
function is_cancel(url,newStatus, id) {
  
  var statusText = newStatus === 1 ? 'Auction' : 'Auction'
      $.ajax({
          'headers': {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: url,
          method: "POST",
          dataType: "JSON",
          data: { id: id, cancel: newStatus },
          success: function (res) {
             

              toastr.success('Auction changed successfully', 'Success');
              dataTable.draw(false);
          }
      });
}
  </script>
  
