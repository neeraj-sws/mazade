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
                            <a href="javascript:void(0);" class="btn btn-primary"
                                onclick="addForm('{{ $route->add }}');return false;"><i
                                    class="bx bxs-plus-square"></i>Add</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th> S.No.</th>
                                <th>Title</th>
                                <th>Header Image</th>
                                <th>Content Image</th>
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
                data: 'title'
            },
            {
                data: 'headerImage'
            },
            {
                data: 'icon'
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


    $(document).ready(function() {
        $('.toggle-class').bootstrapToggle();
        
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') ? 1 : 0;
            var user_id = $(this).data('id');
    
            // Assuming you have defined the function status_change(url, newStatus, id) somewhere
    
            // Call the status_change function with appropriate parameters
            status_change('/changeStatus', status, user_id);
        });
    });

    </script>
    @endsection