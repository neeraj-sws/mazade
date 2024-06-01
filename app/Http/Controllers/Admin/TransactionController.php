<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User,State,City,Favorite,Appointment, AppointmentDetaile,Upload,Transaction,Orders};
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    protected $route;

  protected $single_heading;  
   public function __construct()
   {

    $this->route = new \stdClass;
    $this->single_heading = "Transaction Details";
    $this->route->list = route('admin.transaction.list');
 
   }

   public function index()
   {
    return view('admin.transaction.index',['single_heading'=>$this->single_heading, 'route'=> $this->route  ]);
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
 
      $qry = Transaction::with(['order','order.AuId','order.AuId.user'])->orderBy($columnName, $columnSortOrder);
    //   ->where('transaction.transaction_id', 'LIKE', '%' . $searchValue . '%')
    //   ->leftJoin('withdraw_history', function($join) {
    //       $join->on('transaction.withdraw_id', '=', 'withdraw_history.id'); 
    //   })
    //   ->leftJoin('payments', function($join) {
    //       $join->on('transaction.payment_id', '=', 'payments.id'); 
    //   })
    //   ->leftJoin('users', 'users.id', '=', 'withdraw_history.company_id')
    //   ->orWhere('users.name', 'LIKE', '%' . $searchValue . '%');
          
          $result = $qry->get();

    //   echo "<pre>";print_r($result->toArray());die;
      
      $totalRecordwithFilter = $totalRecords = $qry->count();
      $result = $qry->offset($row)->take($rowperpage)->get();
      $data = array();
      $i = 1;

        foreach ($result as $row) {

        //   if($row->type == 0){
        //     $status = '<p>WithDraw</p>';
        //   }elseif($row->type == 1){
        //     $status = '<p>Deposite</p>';
        //   }
        //   $method = $row->Withdraw ? $row->Withdraw->payment_method : '-';
        //   $payment = $row->Withdraw ? $row->Withdraw->withdraw_amout : ($row->Payment ? $row->Payment->amount : '-');
        //   $paymentminus = $row->Withdraw ? (float)$row->Withdraw->withdraw_amout * 0.92 : '-';
     
        $paymentMethod = $amount=$paymentstatus=$pstatus = "";
          
                // echo "<pre>"; print_r(json_decode($row->transaction_detail)); 
                if(!empty(json_decode($row->transaction_detail))){
        
                    $transaction_details =  json_decode($row->transaction_detail);
                    $paymentMethod =  $transaction_details->payment_info->payment_method;
                    $paymentstatus =  $transaction_details->payment_result->response_status;
                    if($paymentstatus == 'A'){
                        $pstatus = 'Success';
                    }else{
                        $pstatus = 'Failed';
                    }
                    $amount =  $transaction_details->tran_total;
    
                }
             $tamount = "null";
             $commission = "null";
                if(!empty($row->order)){
                    $commission = showcommission($row->order->cat_id);    
                    $tamount =  calculateCommission($amount,$commission);
                }
          $data[] = array(
              
                "id"=> date('d-m-Y', strtotime($row->created_at)),
                "transaction"=>$row->transaction_id,
                "user"=>@$row->order->AuId->user->name,
                 "payment"=>@$paymentMethod,
                 "amount"=> $amount,
                "tamount"=> $tamount !="null"?$amount-$tamount:$tamount,
                "status"=>$pstatus,
                "fee" => $tamount ? $tamount : $commission ,
                "commission" => $commission.'%',
              
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
