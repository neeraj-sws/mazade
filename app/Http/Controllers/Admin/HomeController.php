<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{Home, Upload};
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $route;

    protected $single_heading;

    public function __construct()
    {
          $this->route = new \stdClass;
          $this->single_heading = "Home";
          $this->route->list = route('admin.home.list');
          $this->route->add = route('admin.home.add');
          $this->route->store = route('admin.home.store');
          $this->route->edit = route('admin.home.edit',':id');
          $this->route->destroy = route('admin.home.destroy',':id');
          $this->route->saveimage = route('admin.home.saveimage');
    }

    public function index()
    {
           return view('admin.home.index',['route'=>$this->route, 'single_heading'=>$this->single_heading]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function list()
    {
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; 
        $columnIndex = $_POST['order'][0]['column']; 
        $columnName = $_POST['columns'][$columnIndex]['data']; 
        $columnSortOrder = $_POST['order'][0]['dir']; 
        $searchValue = $_POST['search']['value']; 

      
  
        $qry = Home::orderBy($columnName, $columnSortOrder)->where('title', 'LIKE', '%' . $searchValue . '%') ->orWhere('description', 'LIKE', '%' . $searchValue . '%');
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


                           



                        $file='';
                        if ($row->photo) {
                            $file = '<img src="' . asset('uploads/home/'.@$row->photo->file) . '" class="img-fluid table-image" alt="" width="50" height="50" >';
                        }
              
                
              $data[] = array(
                  "sno" => $i,
                  "title"=>ucfirst($row->title),
                  "description"=>$row->description,
                  "file_id"=> $file,
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
        return view('admin.home.add',['route'=> $this->route , 'single_heading'=> $this->single_heading]);
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
                    'image'=>'required',
                ]
            );

          

            // echo $slug;die;

                if($validator->fails()){
                    return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
                }else{
                    $info = Home::create([
                        'title'=>$request->title,
                        'icon'=>$request->image,
                        'description'=>$request->description,
                       
                    ]);

                    
                    return response()->json(['status' => 1, 'message' => $this->single_heading .' saved successfully' ]);
                }
            }
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $info = Home::find($id);
        return view('admin.home.edit',['route'=>$this->route,'single_heading'=>$this->single_heading, 'info'=>$info]);
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
                'description'=>'required',
                'image'=>'required',
            ]
          );  
          
          if($validator->fails())
          {
            return response()->json(['status'=>0 ,'error'=>$validator->errors()]);
          }else{
            $info= Home::find($request->id)->fill([
                'title'=>$request->title,
                'icon'=>$request->image,
                'description'=>$request->description,
            ])->save();

            return response()->json(['status'=> 1 , 'message' => $this->single_heading .' updated successfully']);
    
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delt = Home::destroy($id);
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
}