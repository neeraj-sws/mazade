<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\{User,Auction,Auctionitems,Oders};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CompanieslistController extends Controller
{
    
     public function auctionsbit()
    {
        $company = Auth::guard('companie')->user();
    

        return view('companies.auctionbid',['company' => $company]);
    }
   

  public function list(Request $request)
   {
   
      $draw = $_POST['draw'];
      $row = $_POST['start'];
      $rowperpage = $_POST['length']; 
      $columnIndex = $_POST['order'][0]['column']; 
      $columnName = $_POST['columns'][$columnIndex]['data'];
      $columnSortOrder = $_POST['order'][0]['dir'];
      $searchValue = $_POST['search']['value']; 

        $company = Auth::guard('companie')->user();

      $qry = Auction::with(['CatId', 'status_id'])->where('oder_id', 'LIKE', '%' . $searchValue . '%')->where('name', 'LIKE', '%' . $searchValue . '%');
      $result = $qry->get();

      $totalRecordwithFilter = $totalRecords = $qry->count();
      $result = $qry->offset($row)->take($rowperpage)->get();
      $data = array();
      $i = 1;

        foreach ($result as $row) {

                $itames = Auctionitems::with(['companyId'])->where('auction_id' , $row->id)->get();

                foreach($itames as $itame){
                    // $price = $itame->price;

                    $companys = $itame->companyId->is_bid_add; 

                      $company_id =  $itame->companie_id ;

                      $idd = $itame->id;

                      if($itame && $company->is_bid_add == 1){
                        $price = $itame->price;
                    }else{
                        $price = "-";
                    }
                 }
              
                $action = '<div class="d-flex  order-actions justify-content-around">';

                // echo "<pre>";print_r($companys);die;

                if( $companys == 1){
                        
                        $action .= '<a href="javascript:void(0);" class="d-flex align-items-center btn btn-primary" onclick="edit_row(\''.route('auctionupdate', ['id' => $idd]).'\');">Bid View</a>';

                        // $action .= '<a href="javascript:void(0);" class="d-flex align-items-center btn btn-primary" onclick="edit_row(\''.route('detaills', ['id' => $row->id]).'\');">Bid Add</a>';
                    }
                else{

                    if ($row->status == 8 || $row->status == 5){
                        $action .= '<a href="javascript:void(0);" class="d-flex align-items-center btn btn-primary" onclick="edit_row(\''.route('auctioncode', ['id' => $row->id]).'\');">Code</a>';
                    }

                    elseif($row->status == 1 || $row->status == 2){
                        $action .= '<a href="javascript:void(0);" class="d-flex align-items-center btn btn-primary" onclick="edit_row(\''.route('detaills', ['id' => $row->id]).'\');">Bid Add</a>';
                    }
                    else{
                        $action .=   '-';
                    }
                }
            
           
            $action .= '</div>';

        $time =  date_format($row->created_at,"h:i:s");


            $data[] = array(
                "sno" => $i,
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

   public function auctionupdate($id)
   {
       $startauction = Auctionitems::with(['CatId', 'AuId'])->findOrFail($id);
     
       return view('companies.bitupdate' , ['startauction' => $startauction ]);
   }


   public function bidupdate(Request $request)
   {
        $status = Auctionitems::find($request->id);
        $status->price = $request->price;
        $status->save();

        return redirect()->route('auctions.bit')
        ->with('success', 'Auction Bit updated successfully');
   }

   public function status(Request $request)
   {

    //    echo "<pre>";print_r($request->all());die;
       $status = Auction::find($request->id);
       $status->status = $request->status;
       $status->save();
       return response()->json(['success' => 1,  'status Accept successfully']);
   }



}
