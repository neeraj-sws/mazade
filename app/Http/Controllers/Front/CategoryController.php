<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SellerCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $user = auth()->user()->id;

        $allCategories = Category::with(['sellerCategory'=>function($qry) use ($user){
            $qry->where('seller_id',$user);
        }])->where('status', 1)->get();

        $favCategories = SellerCategory::with('category')->where('seller_id',auth()->user()->id)
        ->whereHas('category',function($qry) {
            $qry->where('status',1);
        })
        ->orderBy('category_level','asc')
        ->get();

       return view('front.manage-categories',compact('favCategories','allCategories'));
    }
    public function store(Request $request){
        $user = auth()->user()->id;

      
        
        if($request->add == 1){
            SellerCategory::create([
                'seller_id'=>$user,
                'categories_id'=> $request->id,
                'category_level'=> 0,
            ]);
            $msg = 'Category added as favorite.';
        }else{
            SellerCategory::where([
                'seller_id'=>$user,
                'categories_id'=> $request->id,
            ])->delete();
            $msg = 'Category removed from favorite.';
        }

        $favCategories = SellerCategory::with('category')->where('seller_id',auth()->user()->id)
        ->whereHas('category',function($qry) {
            $qry->where('status',1);
        })
        ->orderBy('category_level','asc')
        ->get();

        $view = view('front.components.categories.categories',compact('favCategories'))->render();
        return response()->json(['code'=>1,'html'=>$view,'msg'=>$msg]);

    }

    public function updateOrder(Request $request) {
        $order = $request->input('order');
        
        foreach ($order as $key => $id) {
            SellerCategory::where('id', $id)->update(['category_level' => $key]);
        }
    
        return response()->json(['success' => true]);
    }
}
