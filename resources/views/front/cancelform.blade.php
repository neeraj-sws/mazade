@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
      
        <div class="col-md-8"> 

              
                <form class="row g-3"action="{{ route('auctioncancel') }}"  method="POST">
                    @csrf
              
                  <input type="hidden" name="category_id" value="{{ $oders->category_id }}" class="form-control" />
                  <input type="hidden" name="company_id" value="{{ $oders->company_id }}" class="form-control" />
                  <input type="hidden" name="username" value="{{ $user->id }}" class="form-control" />
                  <input type="hidden" name="Paid" value="{{ $oders->price }}" class="form-control" />
              
                <div data-mdb-input-init class="">
                    <label class="form-label" for="form6Example7">Reason</label>
                    <textarea class="form-control" name="reason" rows="4"></textarea>
                </div>
              
              
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" onclick="is_cancel('{{ route('companie_cancel') }}','1', {{ $oders->id }})" class="btn btn-primary">Submit</button>
               </div>
              </form>
          

        </div>
    </div>
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
                  // $('#st_loader_' + id).hide();
    
                  toastr.success('Auction changed successfully', 'Success');
                  dataTable.draw(false);
              }
          });
    }
      </script>