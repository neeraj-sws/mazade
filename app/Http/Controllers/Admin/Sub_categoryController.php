<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\{SubCategory,Upload,Category,MetaInput};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Sub_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $route;

    protected $single_heading;

    public function __construct()
    {
          $this->route = new \stdClass;
          $this->single_heading = "Sub Category";
          $this->route->list = route('admin.sub_category.list');
          $this->route->add = route('admin.sub_category.add');
          $this->route->store = route('admin.sub_category.store');
          $this->route->status = route('admin.sub_category.status');
          $this->route->edit = route('admin.sub_category.edit',':id');
          $this->route->destroy = route('admin.sub_category.destroy',':id');
          $this->route->saveimage = route('admin.sub_category.saveimage');
          $this->route->metainputs = route('admin.sub_category.metainputs',':id');
          $this->route->savemetainputs = route('admin.sub_category.savemetainputs',);
    }

    public function index()
    {
           return view('admin.sub_category.index',['route'=>$this->route, 'single_heading'=>$this->single_heading]);
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
       

        $qry = SubCategory::orderBy($columnName, $columnSortOrder)->where('title', 'LIKE', '%' . $searchValue . '%') ->orWhere('description', 'LIKE', '%' . $searchValue . '%');
        $result = $qry->get();
  
        $totalRecordwithFilter = $totalRecords = $qry->count();
        $result = $qry->offset($row)->take($rowperpage)->get();
        $data = array();
        $i = 1;
          foreach ($result as $row) {

              $edit_url = $this->route->edit;
              $destroy = $this->route->destroy;
              $action = '<div class="d-flex  order-actions">';
              $action .= '<a href="javascript:void(0);" onclick=edit_row("'.$edit_url.'",'.$row->id.');><i class="la-user-edit la"></i></a>';
              $action .= '&nbsp;&nbsp;<a href="javascript:void(0);"onclick=delete_row("'.$destroy.'",'.$row->id.')><i class="feather icon-trash-2"></i></a>';
              $action .= '</div>';

              $category = Category::where('id',$row->category_id)->first();

            //  echo "<pre>";print_r($category->title);die;
        //     $cat = $category->title;


            $status_url = $this->route->status;
            $status = '<div class="form-check form-switch">
            <input class="form-check-input toggle-class" type="checkbox" data-id="'.$row->id.'" '.($row->status == 1 ? 'checked' : '').' onclick="status_change(\''.$status_url.'\', this.checked ? 1 : 0, '.$row->id.', this)">
            </div>';
            
            if ($row->category_id) {
                $file = $row->category_id;
            }


            $file='';
            if ($row->photo) {
                $file = '<img src="' . asset('uploads/services/' . @$row->photo->file) . '" class="img-fluid table-image" alt="" width="50" height="50" >';
            }

            $meta_url =$this->route->metainputs;
            $meta = '<button class="btn btn-secondary btn-sm" onclick=edit_row("'.$meta_url.'",'.$row->id.');>Add Meta</button>';
         
         
            $data[] = array(
                "sno" => $i,
                "title"=>ucfirst($row->title),
                "category"=>ucfirst(@$category->title),
                "file_id"=> $file,
                "meta"=> $meta,
                "status"=>$status,
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

    public function create()
    {

        $category = Category::where('status',1)->get();

        return view('admin.sub_category.add',['route'=> $this->route , 'single_heading'=> $this->single_heading  ,'categories'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
    
        if($request->id){
            return $this->update($request);
            }else{
            $validator = Validator::make(
                $request->all(),
                [
                    'title'=>'required',
                    'description'=>'required',
                    'status'=>'required',
                    'category_id'=>'required',
                    'image'=>'required',
                ]
            );

            $slug = Str::slug($request->title);

                if($validator->fails()){
                    return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
                }else{
                    $info = SubCategory::create([
                        'title'=>$request->title,
                        'slug'=>$slug,
                        'icon'=>$request->image,
                        'description'=>$request->description,
                        'category_id'=>$request->category_id,
                        'status'=>$request->status,
                    ]);

                    return response()->json(['status' => 1, 'message' => $this->single_heading .'saved successfully' ]);
                }
            }
    }

    /**
     * Display the specified resource.
     */

    public function status(Request $request)
    {
        $status = SubCategory::find($request->id);
        $status->status = $request->status;
        $status->save();
        return response()->json(['success' => 1, 'message' => $this->single_heading . ' status changed successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {

        $category = Category::get();  
        $info = SubCategory::find($id);

        $categorys= $info->category_id;
        $clientCategory = explode(',',$categorys);

       // echo "<pre>";print_r($category);die;

        return view('admin.sub_category.edit',['route'=>$this->route,'single_heading'=>$this->single_heading,'categories' => $category,'clientCategorys'=>$clientCategory, 'info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'=>'required',
                'icon'=>'required',
                'description'=>'required',
                'status'=>'required',
                'category_id'=>'required',
            ]
          );  
          
          if($validator->fails())
          {
            return response()->json(['status'=>0 ,'error'=>$validator->errors()]);
          }else{
            $info= SubCategory::find($request->id)->fill([
                       'title'=>$request->title,
                        'icon'=>$request->icon,
                        'description'=>$request->description,
                        'category_id'=>$request->category_id,
                        'status'=>$request->status,
            ])->save();
            return response()->json(['status'=> 1 , 'message' => $this->single_heading .' updated successfully']);
    
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delt = SubCategory::destroy($id);
          return response()->json(['status'=>1, 'message' => $this->single_heading . ' deleted successfully']);
    }

    public function imageupload(Request $request)
    {
// dd($request->all());
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

    public function metaInputs($id)
    {
        $meta_inputs = MetaInput::where('subcat_id', $id)->get()->toArray();
        
        return view('admin.sub_category.addmeta',['route'=>$this->route,'single_heading'=>'Meta Add', 'id'=>$id,'meta_inputs' =>  $meta_inputs]);
    }
    public function saveMetaInputs(Request $request)
    {
        
        if($request->id){
            $validator = Validator::make(
                $request->all(),
                [
                    'title.*'=>'required',
                    'description.*'=>'required',
                ]
            );           

            if($validator->fails()){
                return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
            }else{
                $data = $request->input('title'); 
                $id = $request->id; 
                $descriptions = $request->input('description');
                
                foreach($data as $key => $title) {
                    $slug = Str::slug($title);
                        MetaInput::create([
                        'title' => $title,
                        'subcat_id' => $id, 
                        'description' => $descriptions[$key], 
                        'slug' => $slug , 
                    ]);
                }
                
                

                return response()->json(['status' => 1, 'message' => 'Meta Inputs saved successfully' ]);
            }
        }
    }
}