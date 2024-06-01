<div class="card">
    <div class="card-body">
        <div class="modal-header">
            <h4 class="modal-title">Detail</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Category Name:</strong>
                        {{ $info->CatId->title }}
                    </div>
                    <div class="form-group">
                        <strong>Sub Category:</strong>
                        {{ $info->subcatid->title }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Quality:</strong>
                        {{ $info->quality }}
                    </div>
                    <div class="form-group">
                        <strong>Budget:</strong>
                        {{ $info->budget }}
                    </div>
                </div>

            </div>
            <div class="row mt-3">
            <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Buyer Name:</strong>
                        {{ $info->user->name }} {{ $info->user->last_name }}
                    </div>
            </div>
            <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Buyer Email:</strong>
                        {{ $info->user->email }}
                    </div>
            </div>
            <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Buyer Mobile No:</strong>
                        {{ $info->user->mobile_number }}
                    </div>
            </div>
            </div>

            <h5 class="modal-title mt-3">Seller Bid Details</h5>
            @foreach($auctionItems as $auctionItem)
            <div class="row mt-2">
            <div class="col-md-6 mt-2">
            <div class="form-group">
                        <strong>Seller Name:</strong>
                        {{ $auctionItem->companyId->user->name }} {{ $auctionItem->companyId->user->last_name }}
                    </div>

               
            </div>
            <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Seller Email:</strong>
                        {{ $auctionItem->companyId->user->email }}
                    </div>
            </div>
            <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Seller Mobile No:</strong>
                        {{ $auctionItem->companyId->user->mobile_number }}
                    </div>
            </div>
            <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Seller Bit Price:</strong>
                        {{ $auctionItem->price }}
                    </div>
            </div>
            <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Seller Bit Status:</strong>
                       {{ $auctionItem->status == 1 ? 'Accept' : 'Not Accept' }}
                    </div>
            </div>
            </div>
            @endforeach
        </div>
    </div>
 </div>
 