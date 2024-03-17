<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\{Payment};
use Illuminate\Http\Request;
use App\Models\Startauction;

class AuctionCompletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $route;

    protected $single_heading;

    public function __construct()
    {
          $this->route = new \stdClass;
          $this->single_heading = "Auction Complet";
          $this->route->list = route('admin.auction.list');
    }

    public function index()
    {
           return view('admin.finishedauction.index',['route'=>$this->route, 'single_heading'=>$this->single_heading]);
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
       
        $qry = Payment::with(['CatId' ,'Userid'])->where('code', 'LIKE', '%' . $searchValue . '%');
        $result = $qry->get();

        $totalRecordwithFilter = $totalRecords = $qry->count();
        $result = $qry->offset($row)->take($rowperpage)->get();
        $data = array();
        $i = 1;
          foreach ($result as $row){

              $data[] = array(
                  "sno" => $i,
                  "category"=>ucfirst($row->CatId->title),
                  "user"=>ucfirst($row->Userid->name),
                  "code"=> $row->code,
                  "amount"=>$row->amount,
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
