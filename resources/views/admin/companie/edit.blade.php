<div class="card">
   <div class="card-body">
       <div class="modal-header">
           <h4 class="modal-title">Edit {{ $single_heading }}</h4>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body py-3">
           <form class="row g-3" action="{{$route->store}}"
               onsubmit="event.preventDefault();form_submit(this);return false;" method="POST">
               @csrf
               <input type="hidden" name="id" value="{{ $info->id }}">
               <div class="col-md-6">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control"   name="name" value="{{ $info->name }}">
               </div>

               <div class="col-md-6">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $info->email }}">
             </div>

               <div class="col-md-6">
                  <label for="name" class="form-label">Phone</label>
                  <input type="number" class="form-control"   name="phone" value="{{ $info->phone }}">
               </div>

               <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="1" @if ($info->status == 1) selected @endif> Active </option>
                    <option value="0" @if ($info->status == 0) selected @endif> Inactive </option>
                </select>
            </div>

               <div class="col-md-12">
                  <label for="Outletname" class="form-label">Address</label>
                     <textarea class="form-control" aria-label="With textarea" style="position: relative; " id="address" name="address"> {{$info->address}} </textarea>
               </div>

               <div class="row mt-2">
                <div class="col-md-10">
                    <label for="Outletname" class="form-label">Profile</label>
                    <div class="custom-file">
                        <input type="hidden" name="image_path" value="uploads/services/">
                        <input type="hidden" name="image_name" value="image">
                        <input  type="file" class="custom-file form-control" name="image"
                            onchange="upload_image($(form),'{{ $route->saveimage }}','image','profile_image');return false;"
                            accept=".jpg,.jpeg,.png">
                        <input type="hidden" name="profile_image" id="profile_image" value="{{$info->file_id}}">
                        <i class="image_loader fa-btn-loader fa fa-refresh fa-spin fa-1x fa-fw"
                            style="display:none;"></i>
                        <label id="lblErrorMessageBannerImage" style="color:red"></label>
                    </div>
                </div>
               
                <div class="col-md-2 mt-3">
                    @if($info->register)
                    <img src="{{asset('uploads/services/'.$info->photo->file)}}" id="image_prev"
                        class="img-thumbnail " alt="" width="100" height="100">
                    @else
                    <img src="" id="image_prev" class="img-thumbnail " alt="" width="100" height="100"
                        style="display:none">
                    @endif
                    <label id="lblErrorMessageBannerImage" style="color:red"></label>
                </div>
            </div>


               <div class="row mt-2">
                <div class="col-md-10">
                    <label for="Outletname" class="form-label">Commerical Register</label>
                    <div class="custom-file">
                        <input type="hidden" name="image_path" value="uploads/services/">
                        <input type="hidden" name="image_name" value="image">
                        <input accept="pdf" type="file" class="custom-file form-control" name="image_pdf"
                            onchange="upload_image($(form),'{{ $route->imagepdf }}','image_pdf','pdf_file');return false;"
                            accept=".jpg,.jpeg,.png">
                        <input type="hidden" name="pdf_file" id="pdf_file" value="{{$info->register}}">
                        <i class="image_loader fa-btn-loader fa fa-refresh fa-spin fa-1x fa-fw"
                            style="display:none;"></i>
                        <label id="lblErrorMessageBannerImage" style="color:red"></label>
                    </div>
                </div>
                <div class="col-md-2 mt-3">
                  
                    <img src="" id="image_pdf_prev" class="img-thumbnail " alt="" width="100" height="100"
                        style="display:none">

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
