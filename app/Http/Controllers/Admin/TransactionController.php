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

      $orders = Orders::with('comid','AuId','CatId')->get();
        
      $qry = Transaction::with('Withdraw', 'Payment')
      ->where('transaction.transaction_id', 'LIKE', '%' . $searchValue . '%')
      ->leftJoin('withdraw_history', function($join) {
          $join->on('transaction.withdraw_id', '=', 'withdraw_history.id'); 
      })
      ->leftJoin('payments', function($join) {
          $join->on('transaction.payment_id', '=', 'payments.id'); 
      })
      ->leftJoin('users', 'users.id', '=', 'withdraw_history.company_id')
      ->orWhere('users.name', 'LIKE', '%' . $searchValue . '%');
          
          $result = $qry->get();

      // echo "<pre>";print_r($result);die;
      
      $totalRecordwithFilter = $totalRecords = $qry->count();
      $result = $qry->offset($row)->take($rowperpage)->get();
      $data = array();
      $i = 1;

        foreach ($result as $row) {

         $userid =  $row->Withdraw ? $row->Withdraw->company_id : ($row->Payment ? $row->Payment->company_id : '');
          $user = User::where('id' ,$userid)->first();


          // echo $row->Withdraw;die;

          if($row->type == 0){
            $status = '<p>WithDraw</p>';
          }elseif($row->type == 1){
            $status = '<p>Deposite</p>';
          }
          $method = $row->Withdraw ? $row->Withdraw->payment_method : '-';
          $payment = $row->Withdraw ? $row->Withdraw->withdraw_amout : ($row->Payment ? $row->Payment->amount : '-');
          $paymentminus = $row->Withdraw ? (float)$row->Withdraw->withdraw_amout * 0.92 : '-';
          
          $data[] = array(
              
                "date"=> date('d-m-Y', strtotime($row->created_at)),
                "transaction"=>$row->transaction_id,
                "user"=>$user->name,
                "payment"=> $method ,
                "amount"=> $payment,
                "tamount"=> $paymentminus,
                "status"=>$status,
                "fee" => $row->Withdraw ? '8%' : '-',
              
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
