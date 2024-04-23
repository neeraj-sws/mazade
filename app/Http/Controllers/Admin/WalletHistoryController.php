<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User,State,City,Favorite,Appointment, AppointmentDetaile,Upload,WithdrawHistory,Orders, Transaction, WalletHistory};
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WalletHistoryController extends Controller
{
    protected $route;

    protected $single_heading;
   public function __construct()
   {

    $this->route = new \stdClass;
    $this->single_heading = "Wallet History";
    $this->route->list = route('admin.withdraw.list');
    $this->route->accept = route('admin.withdraw.accept');
    $this->route->reject = route('admin.withdraw.reject');
   }

   public function index()
   {
    return view('admin.walletHistory.index',['single_heading'=>$this->single_heading, 'route'=> $this->route  ]);
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

      $qry = WalletHistory::with('user');
      $result = $qry->get();

      // echo "<pre>"; print_r($result->toArray()); die;
      
      $totalRecordwithFilter = $totalRecords = $qry->count();
      $result = $qry->offset($row)->take($rowperpage)->get();
      $data = array();
      $i = 1;

        foreach ($result as $row) {

          if($row->status == 0){
          $action = 'Add in '.$row->user->name."'s" .' wallet';
          
          }else{
            $action = 'Remove in '.$row->user->name."'s" .' wallet';
          }
        


          $data[] = array(
              
                "date"=> date('d-m-Y', strtotime($row->created_at)),
                "amount"=>$row->amount,
                "status"=>$action,
                "name"=>$row->user->name,
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

   

   
   



}
