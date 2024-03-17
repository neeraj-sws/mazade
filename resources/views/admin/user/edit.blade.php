<style>
   .select2-container {
    width: 100% !important;
}
</style>
<div class="card">
   <div class="card-body">
      <div class="modal-header">
         <h4 class="modal-title">Edit {{ $single_heading }}</h4>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-3">
         <form class="row g-3" action="{{$route->store}}" onsubmit="event.preventDefault();form_submit(this);return false;" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $info->id }}">
            <div class="col-md-6">
               <label for="name" class="form-label">Customer Name</label>
               <input type="text" class="form-control"   name="name" value="{{ $info->name }}">
            </div>
            <div class="col-md-6">
               <label for="Email" class="form-label">Email</label>
               <input type="email" class="form-control" name="email" value="{{ $info->email }}">
            </div>
          
            <div class="col-md-12">
               <label for="name" class="form-label">Phone</label>
               <input type="number" class="form-control"   name="phone" value="{{ $info->mobile_number }}">
            </div>

            <div class="col-md-6">
               <label for="status" class="form-label">Status</label>
               <select class="form-select" name="status">
                   <option value="1" @if ($info->status == 1) selected @endif> Active </option>
                   <option value="0" @if ($info->status == 0) selected @endif> Inactive </option>
               </select>
           </div>

            <div class="row mt-2">
               <div class="col-md-10">
                   <label for="Outletname" class="form-label">Photo</label>
                   <div class="custom-file">
                       <input type="hidden" name="image_path" value="uploads/services/">
                       <input type="hidden" name="image_name" value="image">
                       <input type="file" class="custom-file form-control" name="image"
                           onchange="upload_image($(form),'{{ $route->saveimage }}','image','image');return false;"
                           accept=".jpg,.jpeg,.png">
                       <input type="hidden" name="image" id="image" value="{{$info->image}}">
                       <i class="image_loader fa-btn-loader fa fa-refresh fa-spin fa-1x fa-fw"
                           style="display:none;"></i>
                       <label id="lblErrorMessageBannerImage" style="color:red"></label>
                   </div>
               </div>
               <div class="col-md-2 mt-3">
                   @if($info->image)
                   <img src="{{asset('uploads/services/'.$info->photo->file)}}" id="image_prev"
                       class="img-thumbnail " alt="" width="100" height="100">
                   @else
                   <img src="" id="image_prev" class="img-thumbnail " alt="" width="100" height="100"
                       style="display:none">
                   @endif
                   <label id="lblErrorMessageBannerImage" style="color:red"></label>
               </div>
           </div>

          
            <div class="col-12">
               <button type="submit" class="btn btn-primary float-end">Save <i class="st_loader spinner-border spinner-border-sm"
                  style="display:none;"></i></button>
            </div>
         </form>
      </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>

$(document).ready(function(){
    $('.select2').select2();
});

function selectSate()
        {
         // alert('work');
         var selectedValue = document.getElementById("state").value;
         $.ajax({
                  headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                  url: "{{ $route->userStateData }}",
                  method: "POST",
                  data: { id: selectedValue },
                  success: function (response)
                 { 
                  $('#cities').html(response.cities);
                },
               });
        }

</script>