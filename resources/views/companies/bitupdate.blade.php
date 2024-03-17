<div class="card">
  <div class="card-body">

    <div class="modal-header">
  </div>
        <div class="container">
          
            <div class="d-flex justify-content-around">
                <div class="col-md-8">

      
          {{-- company --}}

            <form action="{{ route('bidupdate') }}" method="post">
                <!-- Form fields here -->
                @csrf
              
                    <input type="hidden" name="id"  value="{{ $startauction->id }}" class="form-control"/>


                    
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text"  value="{{ $startauction->AuId->oder_id }}" id="form4Example1" class="form-control"  readonly />
              </div>
              
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" value="{{ $startauction->CatId->title }}" id="form4Example2" class="form-control"  readonly />
                </div>

                   
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" name="price" value="{{ $startauction->price }}" class="form-control"/>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary">Bid Update</button>

                    <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                </div>

           </form>
            </div>     
            </div>
      </div>
    </div>
  </div>
</div>

