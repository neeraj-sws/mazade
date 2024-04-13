<div class="popup-content">
            <div class="row all-form-data">
               <form action="{{ route('bidings-code') }}" method="POST" onsubmit="event.preventDefault();form_submit(this);return false;">
                  @csrf 
                  <div class="row">
                     <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                           Category : {{ @$orders->CatId->title }}
                        </div>
                     </div>
                     <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                           Price : ${{ $orders->price }}
                        </div>
                     </div>
                     <div class="col-md-4 my-4">
                        <div class="detail-box-main">
                           Date : 24-04-204
                        </div>
                     </div>
                     <div class="col-md-12 mb-3">
                        <input type="checkcode" id="checkcode" placeholder="Check Code" name="checkcode">
                     </div>
                     <div class="col-md-3 mb-3">
                        <input type="hidden" name="id" value="{{ $orders->id }}">
                        <button type="submit" class="btn btn-primary mt-4">Save</button>
                     </div>
                     <div class="col-md-9 mb-3">
                        <a class="close" id="closeBtn2">Close</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>


<script>
 $("#closeBtn2").click(function() {
    $("#codeenter").hide();
});
</script>