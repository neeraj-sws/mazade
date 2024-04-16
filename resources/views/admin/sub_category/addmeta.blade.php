<div class="card">
    <div class="card-body">
        <div class="modal-header">
            <h4 class="modal-title">{{ $single_heading }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
            <form class="row g-3" action="{{$route->savemetainputs}}"
                onsubmit="event.preventDefault();form_submit(this);return false;" method="POST">
                @csrf
                
                <input type="hidden" name="id" value="{{ $id }}">
                
                <div id="dataInput" class="row">
                @if($meta_inputs)
                    @foreach($meta_inputs as $inputs)
                    <div class="row" id="input-{{ $inputs['id'] }}">
                        <h6 class="card-title pt-2">Input Enter</h6>
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title[]" value="{{ $inputs['title'] }}">
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description[]" value="{{ $inputs['description'] }}">
                        </div>
                        <div class="col-md-12 mt-3">
                           <a href="javascript:void(0);" class="btn btn-danger"  onclick="delete_input('{{$route->removeinput}}',{{ $inputs['id'] }})">Remove</a>
                        </div>
                    </div>
                    @endforeach
                @else 
                    <div class="row">
                        <h6 class="card-title pt-2">Input Enter</h6>
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title[]" >
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description[]" >
                        </div>
                    </div>
                @endif 
                </div>

                <div class="col-12 mt-3">
                    <button type="button" class="btn btn-secondary" id="additionalBtn">Add</button>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-end">Save <i
                            class="st_loader spinner-border spinner-border-sm" style="display:none;"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // Add button click event
        $("#additionalBtn").click(function(){
            let html = '<div class="row additional-input">' + // Add a wrapper with a unique class for each set of additional input fields
                        '<div class="col-md-6">' +
                            '<label for="title" class="form-label">Title</label>' +
                            '<input type="text" class="form-control" name="title[]">' +
                        '</div>' +
                        '<div class="col-md-6">' +
                            '<label for="description" class="form-label">Description</label>' +
                            '<input type="text" class="form-control" name="description[]">' +
                        '</div>' +
                        '<div class="col-md-12 mt-3">' +
                            '<button type="button" class="btn btn-danger remove-btn">Remove</button>' + // Add remove button
                        '</div>' +
                    '</div>';
            $('#dataInput').append(html);
        });

        // Remove button click event
        $(document).on('click', '.remove-btn', function(){
            $(this).closest('.additional-input').remove(); // Remove the closest wrapper when remove button is clicked
        });
    });

    function delete_input(url, id) {
    url = url.replace(':id', id);
    if (confirm('Are you sure you want to delete this?')) {
      $.ajax({
        url: url,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "GET",
        data: {},
        dataType: "JSON",
        success: function (data) {
          toastr.success(data.message, 'Success');
          $('#input-'+ id).html('');
        },
  
      });
    } else {
      return false;
    }
  }
</script>
