<div class="card">
  <div class="card-body">

    <div class="modal-header">

      <h4 class="modal-title">Code</h4>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="container">
         
            <div class="d-flex justify-content-around">
                <div class="col-md-8" style="width: 38rem;">

                    <form action="{{ route('cosestore') }}" method="post">
                        <!-- Form fields here -->
                        @csrf
                        
                         <input type="hidden" name="company_id"  value="{{ $company->id }}"  class="form-control" />

                        <input type="hidden" name="user_id"  value="{{ $startauction->user_id }}"  class="form-control" />

                        <input type="hidden" name="category_id"  value="{{ $startauction->category_id }}" class="form-control" />

                        <input type="hidden" name="auction_id"  value="{{ $startauction->auction_id }}" class="form-control" />

                        <input type="hidden" name="code"  value="{{ $startauction->code  }}" class="form-control" />

                    <div class="form-outline mb-4">
                      <div data-mdb-input-init class="form-outline">
                          <input type="text"  value="{{ $auction->oder_id }}" id="sub_category_input" class="form-control" disabled />
                      </div>
                  </div>
  
                    <div class="form-outline mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <input type="text" name="price"  value="{{ $startauction->CatId->title  }}" class="form-control" readonly />
                      </div>
                    </div>
                    <div class="form-outline mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" name="date"  value="{{  date('d F Y', strtotime($startauction->created_at)) }}" class="form-control" disabled  />
                        </div> 
                      </div>

                      @if($auction->status == 5)

                      <div class="form-outline mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text"  value="{{ @$code->code  }}" class="form-control" readonly/>
                        </div> 
                      </div>

                      @else
                      <div class="form-outline mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" name="code" value="{{ $codes  }}" class="form-control" readonly/>
                        </div> 
                      </div>

                      @endif

                      <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-around">
                      
                        @if($auction->status == 8)
                      <button type="submit" onclick="status_add('{{ route('companie_status') }}','5', {{ $auction->id }})" class="btn btn-primary"> Accept </button>
                      @endif
                      
                      <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
                  </div>     
            </div>
      </div>
    </div>
  </div>
  </div>
     
