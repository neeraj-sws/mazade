<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\{Auction,Auctionitems,Category,Oders};
use Illuminate\Http\Request;
use App\Models\Startauction;

class CanceledAuctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $route;

    protected $single_heading;

    public function __construct()
    {
          $this->route = new \stdClass;
          $this->single_heading = "Canceled Auctions";
          $this->route->list = route('admin.canceled.list');
    }

    public function index()
    {
           return view('admin.canceledauction.index',['route'=>$this->route, 'single_heading'=>$this->single_heading]);
    }

    /**
     * Show the form for creating a new resource.
     */

     public function list(Request $request)
     {

       //   echo "<pre>";print_r($request->all());die;

        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; 
        $columnIndex = $_POST['order'][0]['column']; 
        $columnName = $_POST['columns'][$columnIndex]['data']; 
        $columnSortOrder = $_POST['order'][0]['dir']; 
        $searchValue = $_POST['search']['value']; 
       
        $qry = Auction::with(['CatId','user'])->where('status', 2 )->where('oder_id', 'LIKE', '%' . $searchValue . '%');
        $result = $qry->get();

      
        $totalRecordwithFilter = $totalRecords = $qry->count();
        $result = $qry->offset($row)->take($rowperpage)->get();
        $data = array();
        $i = 1;
          foreach ($result as $row) {
            $price="";
            if($row->id){
                $itame = Auctionitems::where('auction_id' , $row->id)->first();

                  $price = @$itame->price;
               }else{
                $price = "-";
               }
    

              $data[] = array(
                  "sno" => $i,
                  "oder"=>ucfirst($row->oder_id),
                  'name' => ucfirst(@$row->user->name),
                  "category"=>ucfirst($row->CatId->title),
                  "paid"=>$price,
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
  