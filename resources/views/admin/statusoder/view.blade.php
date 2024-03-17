<div class="card">
    <div class="card-body">
        <div class="modal-header">
            <h4 class="modal-title">{{ $single_heading }} Details</h4>
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
                        <strong>Company name:</strong>
                        {{ $info->comid->name }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Bugiet:</strong>
                        {{ $info->AuId->budget }}
                    </div>
                    <div class="form-group">
                        <strong>Price:</strong>
                        {{ $info->price }}
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 