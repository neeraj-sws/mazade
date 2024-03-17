<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\{SubCategory,Upload,Category};
use Illuminate\Http\Request;
use App\Models\Auction;

class ActiveauctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $route;

    protected $single_heading;

    public function __construct()
    {
          $this->route = new \stdClass;
          $this->single_heading = "Auction";
          $this->route->list = route('admin.auctions.list');
          $this->route->view = route('admin.auctions.view' ,':id');
    }

    public function index()
    {
           return view('admin.auction.index',['route'=>$this->route, 'single_heading'=>$this->single_heading]);
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
       
        $qry = Auction::orderBy($columnName, $columnSortOrder)->with(['CatId','subcatid','city'])->where('category', 'LIKE', '%' . $searchValue . '%') ->orWhere('description', 'LIKE', '%' . $searchValue . '%');
        $result = $qry->get();
  
        $totalRecordwithFilter = $totalRecords = $qry->count();
        $result = $qry->offset($row)->take($rowperpage)->get();
        $data = array();
        $i = 1;
          foreach ($result as $row) {

            $edit_url = $this->route->view;
            $action = '<div class="d-flex  order-actions">';
            $action .= '<a href="javascript:void(0);" onclick=edit_row("'.$edit_url.'",'.$row->id.');>Details</a>';


            $sub_category = SubCategory::where('id',$row->sub_category)->first();

      
              $data[] = array(
                  "sno" => $i,
                  "category"=>ucfirst($row->CatId->title),
                  "sub_category"=>@$sub_category->title,
                  "quality"=> $row->quality,
                  "sub_category"=>@$sub_category->title,
                  "bugiet"=>$row->budget,
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
         $info = Auction::with(['CatId','subcatid','city'])->find($id);

       //  echo "<pre>";print_r($info);die;

         return view('admin.companie.view',['route'=>$this->route,'single_heading'=>$this->single_heading, 'info'=>$info]);
     }

   
}
