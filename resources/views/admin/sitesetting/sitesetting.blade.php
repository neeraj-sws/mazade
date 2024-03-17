@extends('admin.layouts.app')
@section('wrapper')
<div class="content">
<div class="main">
<div class="card">
                        <div class="container-fluid">
                            <div class="row content-min-height">
                                <div class="p-0 column-panel border-end" style="max-width: 230px; min-width: 230px; left: -230px;">
                                    <h4 class="mb-3 ms-3 mt-3">Site Setting</h4>
                                    <div class="columns-panel-item-group">
                              
                                        <a class="columns-panel-item columns-panel-item-link " id="site" onclick="adminProfile('{{ $route->sitesettingAdmin}}','{{ $info->id }}','sitesetting');return false;" href="javascript:void(0);">
                                            <div class="d-flex align-items-center">
                                                <i class="feather font-size-lg icon-user"></i>
                                                <span class="ms-3">Site Setting</span>
                                            </div>
                                        </a>
                        
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body" id="editsite">
                                        <div class="mb-4 d-md-flex align-items-center justify-content-between">
                                            <div>
                                                <h4>Personal Information</h4>
                                                <p>Basic info, like Image name and address on this account.</p>
                                            </div>
                                            <button class="btn btn-primary" id="editsite">Edit Profile</button>
                                        </div>
                                      
                                        <div class="row">
                                            <div class="col" style="max-width: 200px;">
                                                <form action="">
                                                <div class="mb-3">
                                                    <img class="img-fluid w-100 rounded" src="{{ asset('uploads/site_image/'. $info->photo->file)}}" id="image_prev" alt="upload avatar">
                                                </div>
                                                <div class="upload upload-text w-100">
                                                    <div>
                                                        <label for="upload" class="btn btn-secondary w-100">Upload</label>
                                                    </div>
                                                    <input id="upload" type="file" name="image" class="upload-input" onchange="upload_image($(form),'{{ $route->siteSettingImage }}','image','file_id');return false;" accept=".jpg,.jpeg,.png">
                                                    <input type="hidden" name="siteId" value="{{ $info->id }}">
                                                    <input type="hidden" name="image_path" value="uploads/site_image/">
                                                    <input type="hidden" name="image_name" value="image">
                                                    <input type="hidden" name="file_id" id="file_id" value="">
                                                </div>
                                                </form>
                                            </div>
                                            <div class="col-md">
                                                <table class="table">
                                                    <tbody>
                                                        <form action="{{ $route->siteSettingUpdate }}" onsubmit="event.preventDefault();adminProfile_submit(this);return false;" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $info->id }}">
                                                       <tr>
                                                          <th class="py-4">Name</th>
                                                          <td class="py-4  imageName">{{ ucfirst($info->name) }}</td>
                                                          <td> <input type="text" name="name" value="{{ $info->name }}" class="imagename form-control d-none"> </td>
                                                       </tr>
            
                                                 </tbody>
                                                 </table>
                                                 <div class="col-12 d-none" id="update">
                                                <button type="submit" class="btn btn-primary float-end">Update <i class="st_loader spinner-border spinner-border-sm"
                                                    style="display:none;"></i></button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection
@section('page-js-script')
<script>
    $("#editsite").click(function() {
   
   $(".imageName").addClass("d-none"); 

   $(".imagename").removeClass("d-none");
   $("#update").removeClass("d-none");
});
</script>
@endsection