@extends('admin.layouts.app')
@section('wrapper')
<div class="content">
    <div class="main">
        <div class="card">
            <div class="card-body">
                <div class="d-flex ">
                    <h4>{{ $single_heading }}</h4>
                    <div class="ms-auto">
                        
                        
                        <div class="btn-group">
                            {{-- <a href="javascript:void(0);" class="btn btn-primary"
                                onclick="addForm('{{ $route->add }}');return false;"><i
                                    class="bx bxs-plus-square"></i>New {{ $single_heading }}</a> --}}
                        </div>
                    </div>
                </div>
                
                <div class="form-group mb-3 pt-3">
                     <h5>Auction Filter</h5>
                       <div class="col-sm-8" id="auction_data">
                           <label class="radio-inline me-3 fw-bold">
                               <input type="radio" name="auction" id="all_auction" onchange="auction_data(this)" class="all align-middle" checked value="1"> All Auction
                           </label>
                           <label class="radio-inline me-3 fw-bold">
                             <input type="radio" name="auction" id="current_action"  onchange="auction_data(this)" class="all align-middle" value="2"> Current Auction
                            </label>
                           <label class="radio-inline me-3 fw-bold">
                               <input type="radio" name="auction" id="end_action"  onchange="auction_data(this)" class="all align-middle" value="3"> End Auction
                           </label>
                           <label class="radio-inline me-3 fw-bold">
                               <input type="radio" name="auction" id="cancel_action" onchange="auction_data(this)" class="all align-middle" value="4"> Cancel Auction
                           </label>
                                                                                            
                       </div>
                    </div>
                    
                    <div>
                          <h5>Filter</h5>
                          
                          <label class="radio-inline me-3 fw-bold">Users</label>
                         <select class="user_name form-select" name="user_name" >  
                         <option value="">Select</option>
                              @foreach($user as $users)
                              <option value="{{$users->id}}">{{$users->name}}</option>
                              @endforeach
                              
                          </select>
                    </div>
                    
                    <div class="row mt-4">
                         <div class="col-6">
                              <label class="radio-inline me-3 fw-bold">Catagories</label>
                          <select class="catagories form-select" name="catagories" onchange="categoriesData(this)">
  
                            <option value="">Select</option>
                              @foreach($category as $categories)
                              <option value="{{$categories->id}}">{{$categories->title}}</option>
                              @endforeach
                              
                          </select>
                          </div>
                              <div class="col-6">
                                   <label class="radio-inline me-3 fw-bold">Sub -Catagories</label>
                        <select class="subcatagories form-select" name="subcatagories">  
                            
                          </select>
                    </div>
                     </div>
                     
                     <div class="mt-4 float-end">
                         <button class="btn btn-sm btn-primary" type="button" onclick="auction_data(this)" ><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                     </div>
                    
                    
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Quality</th>  
                                <th>Budget</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
    @endsection
    @section('page-js-script')
    <script>
       var dataTable = $('#data-table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            'url': "{{ $route->list }}",
            'data': function(data) {
            data.auction = $('input[name="auction"]:checked').val(); 
            data.user = $('.user_name').val()
            data.catagories = $('.catagories').val()
            data.subcatagories= $('.subcatagories').val()
            }
        },
        'lengthMenu': [10, 20, 50, 100, 200],
        'columns': [
            { data: 'sno' },
            { data: 'category' },
            { data: 'sub_category' },
            { data: 'quality' },
            { data: 'bugiet' },
            { data: 'action' }
        ],
        "order": [
            [1, 'DESC']
        ],
        "columnDefs": [{
            "targets": [0, 5],
            "orderable": false,
        }]
    });
    
    $('#data-table').on('page.dt', function() {
        $('#checkAll').prop("checked", false);
        $('.filed_check').prop("checked", false);
    });
    
    function auction_data() {
        dataTable.ajax.reload(); 
    }
      
   function categoriesData(e) {
     $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('admin.auctions.categoryOptions') }}",
        method: "POST",
        data: { catagory: $(e).val() },
        dataType: "JSON",
        success: function(res) {
            $('.subcatagories').html(res.html);
        }
    });
}



    </script>
    @endsection