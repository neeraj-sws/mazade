<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\{Auctionitems,Upload,Category};
use Illuminate\Http\Request;
use App\Models\Startauction;

class CompanybitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $route;

    protected $single_heading;

    public function __construct()
    {
          $this->route = new \stdClass;
          $this->single_heading = "Company Bit";
          $this->route->list = route('admin.companybit.list');
          $this->route->view = route('admin.companybit.view' ,':id');
    }

    public function index()
    {
        return view('admin.companybit.index',['route'=>$this->route, 'single_heading'=>$this->single_heading]);
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
       
        $qry = Auctionitems::with(['CatId' , 'companyId']); 
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
                  "category"=>ucfirst($row->CatId->title),
                  "companie"=> $row->companyId->name,
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
         $info =Auctionitems::with(['CatId' , 'companyId'])->find($id);

       //  echo "<pre>";print_r($info);die;

         return view('admin.companybit.view',['route'=>$this->route,'single_heading'=>$this->single_heading, 'info'=>$info]);
     }


   
}
