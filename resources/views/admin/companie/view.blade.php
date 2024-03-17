<div class="card">
    <div class="card-body">
        <div class="modal-header">
            <h4 class="modal-title">Details {{ $single_heading }}</h4>
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
        </div>
    </div>
 </div>
 