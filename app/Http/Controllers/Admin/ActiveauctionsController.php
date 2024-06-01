<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\{SubCategory,Upload,Category,User,Auctionitems};
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
        $user = User::where('role', 1)->get();
        $category = Category::get();
        return view('admin.auction.index',['route'=>$this->route, 'single_heading'=>$this->single_heading , 'user' => $user ,'category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */

     public function list(Request $request)
     {
         
        //  echo "<pre>";print_r($request->all());die;

        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; 
        $columnIndex = $_POST['order'][0]['column']; 
        $columnName = $_POST['columns'][$columnIndex]['data']; 
        $columnSortOrder = $_POST['order'][0]['dir']; 
        $searchValue = $_POST['search']['value']; 
       
       
       $status = $_POST['auction'];
       $user = $_POST['user'];
       $catagory = $_POST['catagories'];
       $subcatagory = $_POST['subcatagories'];
       
       
        $qry = Auction::orderBy($columnName, $columnSortOrder)->with(['CatId','subcatid','city','auctionItemPrice'])->with('CatId');
        // echo $user;die;
       if(!empty($user)) {
         $qry->where('user_id', $user);
       }
       if(!empty($catagory)) {
         $qry->where('category', $catagory);
       }
       if(!empty($subcatagory)) {
         $qry->where('sub_category', $subcatagory);
       }
       
    //   echo $status;die;
       
      if(!empty($status)) {
      if($status == 1){
        $qry;
      }
      elseif($status == 2){
         $qry->where('status', 1);
      }
      elseif($status == 3){
          $qry->where('status', 3);
      }
      elseif($status == 4){
         $qry->where('status', 2);
      }
      }else{
          $qry;
        
      }
        $result = $qry->orderBy('id', 'desc')->get();
  
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
                  "title"=>ucfirst($row->title),
                  "category"=>ucfirst($row->CatId->title),
                  "sub_category"=>@$sub_category->title,
                  "quality"=> $row->quality,
                  "sub_category"=>@$sub_category->title,
                  "current_btc_price"=>@$row->auctionItemPrice->price,
                  "budget"=>$row->budget,
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
         $info = Auction::with(['CatId','subcatid','city','user'])->find($id);
         $auctionItems = Auctionitems::where('auction_id',$info->id)->get();

       //  echo "<pre>";print_r($info);die;

         return view('admin.companie.view',['route'=>$this->route,'single_heading'=>$this->single_heading, 'info'=>$info, 'auctionItems'=>$auctionItems]);
     }
     
   public function subCatagoryData(Request $request)
{
    $catagory = $request->input('catagory');
    // echo "<pre>";print_r($catagory);die;
    $sub_category = SubCategory::where('category_id', $catagory)->get();
    
    $html = '';
    if ($sub_category->isNotEmpty()) {
        $html .= "<option value=''>Select</option>";
        foreach ($sub_category as $sub) {
            $html .= "<option value='{$sub->id}'>{$sub->title}</option>";
        }
    } else {
        $html .= "<option value=''>No Subcategories found</option>";
    }
    
    return response()->json(['html' => $html]);
}

   
}
