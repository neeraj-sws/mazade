@extends('companies.layouts.add')
@section('content')
<div class="container">
  

            <form action="{{ route('bid.update') }}" method="post" style="width: 26rem;">
                <!-- Form fields here -->
                @csrf

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="auction_id"  value="{{ $startauction->id }}" id="form4Example1" class="form-control"  readonly/>
                </div>
                
                  <!-- Email input -->
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" value="{{ $startauction->CatId->title }}" id="form4Example2" class="form-control"  readonly/>
                   
                  </div>


                    <input type="hidden" name="company_id"  value="{{ $company->id }}" class="form-control"/>

                    <input type="hidden" name="category_id"  value="{{ $startauction->category }}" class="form-control"/>
              
                   
                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" name="price" class="form-control"/>
                   </div>


                <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-around">
                    <button type="submit" onclick="status_change('{{ route('companie_bit') }}','2', {{ $startauction->id }})" class="btn btn-primary">Bid</button>

                    <a href="{{ route('companie.dashboard') }}" class="btn btn-primary">cancel</a>
                </div>

        </form>
    {{-- </div> --}}
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function status_change(url,newStatus, id) {
    alert('a');
    // $('#st_loader_' + id).show();
        $.ajax({
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            method: "POST",
            dataType: "JSON",
            data: { id: id, status: newStatus },
            success: function (res) {
                // $('#st_loader_' + id).hide();

                toastr.success('Acction Bit successfully', 'Success');
                dataTable.draw(false);
            }
        });
    } 
</script>

