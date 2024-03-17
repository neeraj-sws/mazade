<div class="card">
  <div class="card-body">

    <div class="modal-header">

            <h4 class="modal-title">Bid Add</h4>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
        <div class="container">
          <div class="row justify-content-center">


          {{-- <form action="{{ route('bid.update') }}" onsubmit="event.preventDefault();form_submit(this);return false;" method="post" style="width: 38rem;"> --}}

            <form action="{{ route('bid.update') }}" method="post" style="width: 38rem;">
            <!-- Form fields here -->
            @csrf

            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text"  value="{{ $startauction->oder_id }}" id="form4Example1" class="form-control"  readonly/>
            </div>
            
              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" value="{{ $startauction->CatId->title }}" id="form4Example2" class="form-control"  readonly/>
               
              </div>

              <input type="hidden" name="auction_id"  value="{{ $startauction->id }}" id="form4Example1" class="form-control"/>
              
                <input type="hidden" name="company_id"  value="{{ $company->id }}" class="form-control"/>

                <input type="hidden" name="category_id"  value="{{ $startauction->category }}" class="form-control"/>
          
               
                <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" name="price" class="form-control"/>
               </div>


            <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-around">
              
                <button type="submit" onclick="status_add('{{ route('companie_bit') }}','2', {{ $startauction->id }})" class="btn btn-primary">Bid</button>

                <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>

    </form>
          </div>
            </div>
  </div>
      </div>
</div>
    </div>