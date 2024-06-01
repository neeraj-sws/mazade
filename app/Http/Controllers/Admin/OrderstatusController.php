<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\{SubCategory,Upload,Category,Orders};
use Illuminate\Http\Request;
use App\Models\Startauction;

class OrderstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $route;

    protected $single_heading;

    public function __construct()
    {
          $this->route = new \stdClass;
          $this->single_heading = "Status Orders";
          $this->route->list = route('admin.orders.list');
          $this->route->view = route('admin.orders.view' ,':id');
    }

    public function index()
    {
           return view('admin.statusoder.index',['route'=>$this->route, 'single_heading'=>$this->single_heading]);
    }

    /**
     * Show the form for creating a new resource.
     */

     public function list(Request $request)
     {

        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; 
        $columnIndex = $_POST['order'][0]['column']; 
        $columnName = $_POST['columns'][$columnIndex]['data']; 
        $columnSortOrder = $_POST['order'][0]['dir']; 
        $searchValue = $_POST['search']['value']; 
       
        $qry = Orders::with(['CatId' ,'cominfo' , 'AuId', 'transactionId'])->where('is_payment',1);
        $result = $qry->get();

        $totalRecordwithFilter = $totalRecords = $qry->count();
        $result = $qry->offset($row)->take($rowperpage)->get();
        $data = array();
        $i = 1;
          foreach ($result as $row) {

            $edit_url = $this->route->view;
            $action = '<div class="d-flex  order-actions">';
            $action .= '<a href="javascript:void(0);" onclick=edit_row("'.$edit_url.'",'.$row->id.');>Details</a>';

              $data[] = array(
                  "sno" => $i,
                  "orderid"=>$row->order_id,
                  'transaction_id'=>@$row->transactionId->transaction_id,
                  "title"=>$row->AuId->title,
                  "category"=>ucfirst($row->CatId->title),
                  "companie"=> $row->cominfo->company_name,
                  "bugiet"=>$row->AuId->budget,
                  "price"=>$row->price,
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


     public function view($id)
     {
         $info =Orders::with(['CatId' ,'cominfo' , 'AuId'])->find($id);

        //  echo "<pre>";print_r($info);die;

         return view('admin.statusoder.view',['route'=>$this->route,'single_heading'=>$this->single_heading, 'info'=>$info]);
     }
   
}
