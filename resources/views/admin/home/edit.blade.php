<div class="card">
    <div class="card-body">
        <div class="modal-header">
            <h4 class="modal-title">Add {{ $single_heading }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
            <form class="row g-3" action="{{$route->store}}"
                onsubmit="event.preventDefault();form_submit(this);return false;" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $info->id }}">
                <div class="col-md-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $info->title }}">
                </div>
                
         
                <div class="col-12">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3">{{$info->description}}</textarea>
                </div>
                <div class="row mt-2">
                    <div class="col-md-10">
                        <label for="Outletname" class="form-label">Image</label>
                        <div class="custom-file">
                            <input type="hidden" name="image_path" value="uploads/home/">
                            <input type="hidden" name="image_name" value="image">
                            <input type="file" class="custom-file form-control" name="image"
                                onchange="upload_image($(form),'{{ $route->saveimage }}','image','image');return false;"
                                accept=".jpg,.jpeg,.png">
                            <input type="hidden" name="image" id="image" value="{{$info->icon}}">
                            <i class="image_loader fa-btn-loader fa fa-refresh fa-spin fa-1x fa-fw"
                                style="display:none;"></i>
                            <label id="lblErrorMessageBannerImage" style="color:red"></label>
                        </div>
                    </div>
                    <div class="col-md-2 mt-3">
                        @if($info->icon)
                        <img src="{{asset('uploads/home/'.$info->photo->file)}}" id="image_prev"
                            class="img-thumbnail " alt="" width="100" height="100">
                        @else
                        <img src="" id="image_prev" class="img-thumbnail " alt="" width="100" height="100"
                            style="display:none">
                        @endif
                        <label id="lblErrorMessageBannerImage" style="color:red"></label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-end">Save <i
                            class="st_loader spinner-border spinner-border-sm" style="display:none;"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>