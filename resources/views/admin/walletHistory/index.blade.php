@extends('admin.layouts.app')
@section('wrapper')
<div class="content">
<div class="main">
   <div class="card">
      <div class="card-body">
         <div class="d-flex ">
            <h4>{{ $single_heading }}</h4>
            <div class="ms-auto">
               
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
                     <th>Date</th>
                     <th>Amount</th>
                     <th>Status</th>
                     <th>Name </th>
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
    'searching': false,
    'serverMethod': 'Post',
    'ajax': {
        'headers': {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
         'url': "{{ route('admin.wallet-history.list') }}",
        'data': function(data) {
            
        }
    },
    'lengthMenu': [10, 20, 50, 100, 200],
    'columns': [{ data: 'date'},
        {data: 'amount' },
        {data: 'status' },
        {data: 'name' },
   
    ],
    "order": [
        [0, 'DESC']
    ],
    "columnDefs": [{
        "targets": [0,1,2,3],
        "orderable": false, 
    }]


});
$('#data-table').on('page.dt', function() {
    $('#checkAll').prop("checked", false);
    $('.filed_check').prop("checked", false);
});

function showfav(url, id, modal = 'modal-lg') {

$('#modal-default .modal-content').html('');
url = url.replace(':id', id);
$.ajax({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url: url,
  method: "GET",
  data: {},
  success: function (res) {
    $('#' + modal + ' .modal-content').html(res);
    $('#' + modal).modal('show');
  }
});
}


function accept(url,id) {
   
   if (confirm("Are you sure you want to confirm WithDraw")) {
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url: url,
           method: "POST",
           dataType: "JSON",
           data: {id: id },
           success: function (res) {
            if(res.status == 1){
            toastr.success('WithDraw Confirmed successfully', 'Success');
            table.draw();
            }else {
               toastr.warnind('WithDraw Decline successfully', 'Warning');
               }
            }
       });
   } 
 }


 function reject(url,id) {
   
   if (confirm("Are you sure you want to Reject Withdraw")) {
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url: url,
           method: "POST",
           dataType: "JSON",
           data: {id: id },
           success: function (res) {
            if(res.status == 1){
            toastr.success('WithDraw Decline successfully', 'Success');
            table.draw();
            }else {
               toastr.warnind('WithDraw Decline successfully', 'Warning');
               }
            }
       });
   } 
 }



</script>
@endsection
