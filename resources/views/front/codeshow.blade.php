@extends('layouts.app')
@section('content')
        <div class="container">
          <div class="main">
            <div class="card">
              <div class="card-body">
                  <div class="d-flex ">
                      <h4></h4>
                      <div class="ms-auto">
                          <div class="btn-group">
                              <a href="{{ route('categoryshow') }}" class="btn btn-primary"><i class="bx bxs-plus-square"></i>New Auction</a>
                              @foreach ($auctionbit as $aucti)
                              <input type="hidden" name="auction_id" value="{{ $aucti->companie_id }}" class="form-control" />
                              @endforeach
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-hover">
                        <thead>
                            <tr>
                              <th>S.No.</th>
                              <th>Order Id</th>
                              <th>Category Name</th>  
                              <th>Name</th>  
                              <th>Budget</th>
                              <th>Time</th>
                              <th>Price</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                </div>
@endsection
  
@section('page-js-script')
<script>
  window.dataTable = $('#data-table').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'headers': {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          'url': "{{ $route }}",
          'data': function(data) {
              // Add auction_id to the data being sent
              var auctionId = $('[name="auction_id"]').val(); // Assuming your hidden input has name "auction_id"
              data.auction_id = auctionId;
          }
      },
      'lengthMenu': [10, 20, 50, 100, 200],
      'columns': [
          { data: 'sno' },
          { data: 'oder_id' },
          { data: 'category' },
          { data: 'name' },
          { data: 'budget' },
          { data: 'time' },
          { data: 'price' },
          { data: 'status' },
          { data: 'action' }
      ],
      "order": [[1, 'DESC']],
      "columnDefs": [{
          "targets": [0, 4],
          "orderable": false,
      }]
  });
  
  $('#data-table').on('page.dt', function() {
      $('#checkAll').prop("checked", false);
      $('.filed_check').prop("checked", false);
  });
  </script>
  
@endsection