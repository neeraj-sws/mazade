<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User,State,City,Favorite,Appointment, AppointmentDetaile,Upload,WithdrawHistory,Orders};
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WithDrawController extends Controller
{
    protected $route;

    protected $single_heading;
   public function __construct()
   {

    $this->route = new \stdClass;
    $this->single_heading = "WithDraw Details";
    $this->route->list = route('admin.withdraw.list');
    $this->route->accept = route('admin.withdraw.accept');
    $this->route->reject = route('admin.withdraw.reject');
   }

   public function index()
   {
    return view('admin.withdraw.index',['single_heading'=>$this->single_heading, 'route'=> $this->route  ]);
   }

   public function list(Request $request)
   {
 
      ## Read value
      $draw = $_POST['draw'];
      $row = $_POST['start'];
      $rowperpage = $_POST['length']; 
      $columnIndex = $_POST['order'][0]['column']; 
      $columnName = $_POST['columns'][$columnIndex]['data'];
      $columnSortOrder = $_POST['order'][0]['dir']; 
      $searchValue = $_POST['search']['value']; 

      $orders = Orders::with('comid','AuId','CatId')->get();
        

      $qry = WithdrawHistory::where('status' , 0  )->orwhere('payment_method', 'LIKE', '%' . $searchValue . '%')->orwhere('transaction_id', 'LIKE', '%' . $searchValue . '%');
      $result = $qry->get();

      
      $totalRecordwithFilter = $totalRecords = $qry->count();
      $result = $qry->offset($row)->take($rowperpage)->get();
      $data = array();
      $i = 1;

        foreach ($result as $row) {

          $accept_url = $this->route->accept;
          $reject = $this->route->reject;
          if($row->status == 0){
          $action = '<div class="d-flex  order-actions">';
          $action .= '<a href="javascript:void(0);" onclick=accept("'.$accept_url.'",'.$row->id.'); class="btn btn-primary">Accept</a>';
          $action .= '&nbsp;&nbsp;<a href="javascript:void(0);"onclick=reject("'.$reject.'",'.$row->id.') class="btn btn-danger">Reject</a>';
          $action .= '</div>';
          }else{
            $action = "";
          }
          if($row->status == 0){
            $status = '<div class="status-done-table text-nowrap" data-label="Bid Amount(USD)"><p>Pending</p> <div>';
          }elseif($row->status == 1){
            $status = '<div class="status-done-table text-nowrap" data-label="Bid Amount(USD)"><p>Completed</p> <div>';
          }else{
            $status = '<div class="status-done-table text-nowrap" data-label="Bid Amount(USD)"><p>Rejected</p> <div>';
          }


          $data[] = array(
              
                "date"=> date('d-m-Y', strtotime($row->created_at)),
                "transaction"=>$row->transaction_id,
                "payment"=>$row->payment_method,
                "withdraw_amount"=>$row->withdraw_amout,
                "amount"=>'',
                "status"=>$status,
                "fee" => '',
                "action" => $action,
            );

            $i++;
        }

                ## Response
                $response = array(
                    "draw" => intval($draw),
                    "iTotalRecords" => $totalRecords,
                    "iTotalDisplayRecords" => $totalRecordwithFilter,
                    "aaData" => $data
                );
        
                echo json_encode($response);
   }

   

   
   public function accept(Request $request)
   {
       $status = WithdrawHistory::find($request->id);
       $status->status = 1;
       $status->save();

       $data = User::find($status->company_id);
       $data->wallet -= $status->withdrawAmount;
       $data->save();

       $numericCode = mt_rand(100000, 999999);
       Transaction::create([
        'company_id'=> $status->id,
        'payment_id'=> 0,
        'withdraw_id'=> $status->id,
        'transaction_id' => $numericCode,
        'type'=> 0,
           
    ]);

       return response()->json(['success' => 1, 'message' => $this->single_heading . ' WithDraw  accepted successfully']);
   }

   public function reject(Request $request)
   {
       $status = WithdrawHistory::find($request->id);
       $status->status = 2;
       $status->save();
       return response()->json(['success' => 0, 'message' => $this->single_heading . 'WithDraw  Reject successfully']);
   }

   



}
