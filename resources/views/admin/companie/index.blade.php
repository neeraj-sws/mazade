@extends('admin.layouts.app')
@section('wrapper')
<div class="content">
    <div class="main">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h4>{{ $single_heading }}</h4>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="javascript:void(0);" class="btn btn-primary"
                                onclick="addForm('{{ $route->add }}');return false;"><i
                                    class="bx bxs-plus-square"></i> Add</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     {{--    <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                       <h6> <label for="commission">Commission</label></h6>
                        <input type="number" class="form-control" name="commission" id="commission" value = "{{ $commissionValue }}">
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="javascript:void(0);" class="btn btn-primary"
                                onclick="addcommission(this);return false;"><i
                                    class="bx bxs-plus-square"></i> Add</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th> S.No.</th>
                                <th>Company Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Rating</th>
                                {{-- <th>Status</th> --}}
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
    @endsection
    @section('page-js-script')
    <script>
    window.dataTable = $('#data-table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            'url': "{{ $route->list }}",
            'data': function(data) {

            }
        },
        'lengthMenu': [10, 20, 50, 100, 200],
        'columns': [{
                data: 'sno'
            },
            {
                data: 'name'
            },
            {
                data: 'phone'
            },
            {
                data: 'address'
            },
            {
                data: 'rating'
            },
           
            {
                data: 'action'
            },
        ],
        "order": [
            [1, 'DESC']
        ],
        "columnDefs": [{
            "targets": [0, 4],
            "orderable": false,
        }]


    });
    $('#data-table').on('page.dt', function() {
        $('#checkAll').prop("checked", false);
        $('.filed_check').prop("checked", false);
    });

    function addcommission(e)
    {
       var  commission = $('#commission').val();
        $.ajax({
                type: "post",
                url: '{{ route('admin.companie.add-commission') }}',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{commission_value:commission,commission_key:"commission"},
                success: function (res) {
                if (res.status == 1) {
                    toastr.success(res.message, 'Success');
                } else if(res.status == 2) {
                    toastr.error(res.message, 'Error');
                }

                }
         });
    }
    </script>
    @endsection