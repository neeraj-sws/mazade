<div class="card">
    <div class="card-body">
        <div class="modal-header">
            <h4 class="modal-title">Add {{ $single_heading }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
            <form class="row g-3" action="{{ $route->store }}"
                onsubmit="event.preventDefault();form_submit(this);return false;" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Link</label>
                    <input type="text" class="form-control" name="link" placeholder="Link">
                    
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-end">Save <i
                            class="st_loader spinner-border spinner-border-sm" style="display:none;"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>