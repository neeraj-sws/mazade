<?php

namespace App\Http\Controllers\Companies;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\{Auction,Auctionitems,Oders,Companies,Upload,Payment,Category,SubCategory};
use App\Http\Controllers\Controller;


class CompaniesController extends Controller
{
    //todo: admin login form
  
    public function dashboard()
    {
        $categories = Category::where('status', 1)->get();

        return view('companies.dashboard' , ['categories' => $categories]);
    }

    public function subcategory($slug)
    {
       
        $categories = Category::where('slug', $slug)->first();
        $sub_categories = SubCategory::where('category_id', $categories->id)->where('status', 1)->get();

        $category = SubCategory::with(['CatId'])->where('category_id', $categories->id)->first();

        return view('companies.subcategory' , ['sub_categories' => $sub_categories ,'category' => $category]);
    }

    
    public function auctionactive($slug)
    {
        $sub_category = SubCategory::with('CatId')->where('slug', $slug)->where('status', 1)->first();

        $company = Auth::guard('companie')->user();
        $startauctions = Auction::with('CatId','status_id')->where('sub_category', $sub_category->id)->get();

        return view('companies.auctionactive', [
            'startauctions' => $startauctions,
            'company' => $company
        ]);
    }

    public function image_upload(Request $request)
    {
    //    echo '<pre>'; print_r($request->all()); die;

        $type = $request->type;
        $path = $type . '_path';
        $name = $type . '_name';
        $file_name = $request->$name;
        $file_path = $request->$path;
        $file = $request->file('image');

            if (!empty($file)) {
                $ext = $file->getClientOriginalExtension();
        
                $destinationPath = public_path().'/'.$file_path;
                $file_name = time().".".$file->getClientOriginalExtension();
                $file->move($destinationPath,$file_name);
                 $movedFile =  $file_name;
                 
                $file_data= Upload::create([
                    'file'=>$movedFile,
                ]);

                return response()->json(['status' => 1, 'file_id' => $file_data->id, 'file_path' => asset($file_path . $file_data->file)]);

        }else{ 

            return response()->json(['status' => 0, 'msg' => 'File type not allowed']);
        }
    }
    
    public function detaills($id)
    {

        // echo $id;die;
        $company = Auth::guard('companie')->user();
        $startauction = Auction::with(['CatId'])->findOrFail($id);

        return view('companies.detaills',['startauction' => $startauction ,'company' => $company ]);
    }

    public function bid($id)
    {

        $startauction = Auction::with(['CatId'])->findOrFail($id);

        $company = Auth::guard('companie')->user();

        return view('companies.bid',['startauction' => $startauction ,'company' => $company]);
    }

   

    public function auctions()
    {
        $startauction = Auctionitems::with(['CatId', 'AuId'])->get();
        
        return view('companies.auctions' , ['startauction' => $startauction ]);
    }

    public function auctioncode($id)
    {

        $company = Auth::guard('companie')->user();

        $idd = Auction::with(['CatId'])->findOrFail($id);
        
        $startauction = Auctionitems::with(['CatId'])->where('auction_id' ,$idd->id)->first();

        $code = Oders::where('auction_id' , $id)->first();

        // echo "<pre>";print_r($startauction);die;

        $codes = mt_rand(1000, 9999);
        while (Oders::where('code', $code)->exists()) {
            $codes = mt_rand(1000000000, 9999999999);
        }

        return view('companies.code' 
        , ['startauction' => $startauction 
        ,'company' => $company ,
        'code'=> $code ,'auction'=> $idd,
    'codes'=> $codes]);
    }

  

    public function oders()
    {
         
        $oders = Oders::with(['CatId', 'AuId'])->get();

        $last = Auctionitems::where('status' , 0)->with(['CatId'])->get();

       // echo "<pre>";print_r($oders);die;
        return view('companies.oders_status' , ['oders' => $oders , 'last'=>$last ]);

    }
     
    public function companiebit(Request $request)
     {
        $status = Auction::find($request->id);
       $status->status = $request->status;
       $status->save();
       return response()->json(['success' => 1,  'Acction Bit successfully']);
     }

}
