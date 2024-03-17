<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{User,Auction,Auctionitems};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuctionlictController extends Controller
{
   

     public function list(Request $request)
    {
      
       $draw = $_POST['draw'];
       $row = $_POST['start'];
       $rowperpage = $_POST['length']; 
       $columnIndex = $_POST['order'][0]['column']; 
       $columnName = $_POST['columns'][$columnIndex]['data'];
       $columnSortOrder = $_POST['order'][0]['dir'];
       $searchValue = $_POST['search']['value']; 
 
       $qry = Auction::orderBy($columnName, $columnSortOrder)->with(['CatId', 'status_id'])->where('status' , 2)->where('oder_id', 'LIKE', '%' . $searchValue . '%')->where('name', 'LIKE', '%' . $searchValue . '%');
       $result = $qry->get();
 
 
       $totalRecordwithFilter = $totalRecords = $qry->count();
       $result = $qry->offset($row)->take($rowperpage)->get();
       $data = array();
       $i = 1;
         foreach ($result as $row) {
            $price = "-";
         
            if($row->status == 2){
             $itames = Auctionitems::where('auction_id' , $row->id)->get();
             foreach($itames as $itame){
                $price = $itame->price;
                  $company_id =  $itame->companie_id ;
             }
              
            }else{
             $price = "-";
            }
 
             $action = '<div class="d-flex  order-actions justify-content-around">';
         
         if ($row->status == 2  &&  $itames){
 
             $action .= '<a href="' . route('codeshow', $row->id ) . '" class="d-flex align-items-center btn btn-primary">View Bid</a>';
 
 
             $action .= '<a href="javascript:void(0);" class="d-flex align-items-center btn btn-danger" onclick=status_update("'. route('auction.status') .'",3,'.$row->id.');>End Auction</a>';
         }
        
         else{
             $action .=   '-';
         }
            
             $action .= '</div>';
 
         $time =  date_format($row->created_at,"h:i:s");
 
 
             $data[] = array(
                 "sno" => $i,
                 "oder_id"=>$row->oder_id,
                 "category"=>ucfirst($row->CatId->title),
                 "name"=>ucfirst($row->name),
                 "budget"=>$row->budget,
                 "time"=>$time,
                 "price"=> $price,
                 "status"=>$row->status_id->name,
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

    public function codeshow($id)
   {
         
    // echo $id;die;
       $auctionbit = Auctionitems::where('companie_id' , $id)->get();

       $route = route('auctionbit');

       return view('front.codeshow',['route' => $route ,'auctionbit'=>$auctionbit ]); 
   }

   public function bitlist(Request $request)
   {

       $id = $request->input('auction_id');

       $draw = $_POST['draw'];
       $row = $_POST['start'];
       $rowperpage = $_POST['length']; 
       $columnIndex = $_POST['order'][0]['column']; 
       $columnName = $_POST['columns'][$columnIndex]['data'];
       $columnSortOrder = $_POST['order'][0]['dir'];
       $searchValue = $_POST['search']['value']; 
 
       $qry = Auctionitems::with(['CatId','AuId'])->where('companie_id' , $id);
       $result = $qry->get();

 
       $totalRecordwithFilter = $totalRecords = $qry->count();
       $result = $qry->offset($row)->take($rowperpage)->get();
       $data = array();
       $i = 1;
         foreach ($result as $row) {
 
             $action = '<div class="d-flex  order-actions justify-content-around">';
         
         if ($row->AuId->status == 8){
 
             $action .= '<a href="' . route('codeshow', $row->id) . '" class="d-flex align-items-center btn btn-primary">View Bid</a>';
 
 
             $action .= '<a href="javascript:void(0);" class="d-flex align-items-center btn btn-danger" onclick=status_update("'. route('auction.status') .'",3,'.$row->id.');>End Auction</a>';
         }
        
         else{
             $action .=   '-';
         }
            
             $action .= '</div>';
 
         $time =  date_format($row->created_at,"h:i:s");
 
 
             $data[] = array(
                 "sno" => $i,
                 "oder_id"=>$row->oder_id,
                 "category"=>ucfirst($row->CatId->title),
                 "name"=>ucfirst($row->AuId->name),
                 "budget"=>$row->AuId->budget,
                 "time"=>$time,
                 "price"=> $row->price,
                 "status"=>$row->AuId->status,
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



   public function status(Request $request)
   {
       $is_cancel = Auction::find($request->id);
       $is_cancel->status = $request->status;
       $is_cancel->save();
       return response()->json(['success' => 1,  'Status  successfully']);
   }

}
