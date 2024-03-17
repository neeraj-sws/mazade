
<div class="card">
   <div class="card-body">
      <div class="modal-header">
         <h4 class="modal-title">Add {{ $single_heading }}</h4>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-3">
         <form class="row g-3" action="{{ $route->store }}" onsubmit="event.preventDefault();form_submit(this);return false;" method="POST">
            @csrf
            <div class="col-md-6">
               <label for="name" class="form-label">Admin Name</label>
               <input type="text" class="form-control"  name="name">
            </div>
            <div class="col-md-6">
               <label for="Email" class="form-label">Email</label>
               <input type="email" class="form-control" name="email">
            </div>
            <div class="col-md-6">
               <label for="username" class="form-label">User Name</label>
               <input type="text" class="form-control" name="username">
            </div>
            <div class="col-md-6">
               <label for="Password" class="form-label">Password</label>
               <input type="password" class="form-control" name="password">
            </div>
              
            <div class="row mt-2">
                    <div class="col-md-10">
                        <label for="Outletname" class="form-label">Image</label>
                        <div class="custom-file">
                            <input type="hidden" name="image_path" value="uploads/admin/">
                            <input type="hidden" name="image_name" value="image">
                            <input type="file" class="custom-file form-control" name="image"
                                onchange="upload_image($(form),'{{ $route->saveimage }}','image','image');return false;"
                                accept=".jpg,.jpeg,.png">
                            <input type="hidden" name="image" id="image" value="">
                            <i class="image_loader fa-btn-loader fa fa-refresh fa-spin fa-1x fa-fw"
                                style="display:none;"></i>
                            <label id="lblErrorMessageBannerImage" style="color:red"></label>
                        </div>
                    </div>
                    <div class="col-md-2 mt-3">
                        <img src="" id="image_prev" class="img-thumbnail " alt="" width="100" height="100"
                            style="display:none">
                        <label id="lblErrorMessageBannerImage" style="color:red"></label>
                    </div>
                </div>

            
            <div class="col-12">
                <hr>
               <button type="submit" class="btn btn-primary float-end">Save <i class="st_loader spinner-border spinner-border-sm"
                  style="display:none;"></i></button>
            </div>
         </form>
      </div>
   </div>
</div>