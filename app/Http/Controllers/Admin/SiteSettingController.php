<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{SiteSetting,Upload};
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $route;

    protected $single_heading;

    public function __construct()
    {
          $this->route = new \stdClass;
          $this->single_heading = "Site Setting";
          $this->route->list = route('admin.sitesetting.list');
          $this->route->add = route('admin.sitesetting.add');
          $this->route->store = route('admin.sitesetting.store');
          $this->route->edit = route('admin.sitesetting.edit',':id');
          $this->route->destroy = route('admin.sitesetting.destroy',':id');
          $this->route->adminSite =route('admin.sitesetting.adminSite','');
          $this->route->siteSettingImage =route('admin.sitesetting.siteSettingImage','');
          $this->route->siteSettingUpdate =route('admin.sitesetting.siteSettingUpdate');
          $this->route->sitesettingAdmin =route('admin.sitesetting.sitesettingAdmin');
          $this->route->saveimage = route('admin.sitesetting.saveimage');
         
    }

    public function index()
    {
        return view('admin.sitesetting.index',['route'=>$this->route, 'single_heading'=>$this->single_heading]);
    }

    public function list()
    {
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; 
        $columnIndex = $_POST['order'][0]['column']; 
        $columnName = $_POST['columns'][$columnIndex]['data']; 
        $columnSortOrder = $_POST['order'][0]['dir']; 
        $searchValue = $_POST['search']['value']; 
  
        $qry = SiteSetting::orderBy($columnName, $columnSortOrder)->where('name', 'LIKE', '%' . $searchValue . '%');
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
              $action .= '</div>';

                        $file='';
                        if ($row->photo) {
                            $file = '<img src="' . asset('uploads/site_image/'.@$row->photo->file) . '" class="img-fluid table-image" alt="" width="50" height="50" >';
                        }
                    //    echo $file;
                
              $data[] = array(
                  "sno" => $i,
                  "name"=>ucfirst($row->name),
                  "icon"=> $file,
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


    public function add()
    {
        return view('admin.sitesetting.add',['route'=> $this->route , 'single_heading'=> $this->single_heading]);
    }

    public function store(Request $request)
    {
        if($request->id){
            return $this->update($request);
            }else{
            $validator = Validator::make(
                $request->all(),
                [
                    'name'=>'required',
                    'file_id'=>'required',
                ]
            );

         if($validator->fails()){
                    return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
                }else{
                    $info = SiteSetting::create([
                        'name'=>$request->name,
                        'icon'=>$request->file_id,
                    ]);
                    
                    return response()->json(['status' => 1, 'message' => $this->single_heading .'saved successfully']);
                };
            }
            
    }


    public function edit($id)
    {
        
        $info = SiteSetting::find($id);
        return view('admin.sitesetting.edit',['route'=>$this->route,'single_heading'=>$this->single_heading, 'info'=>$info]);
    }

  
    public function update(Request $request)
    {
       // echo 1;die;
        $validator = Validator::make(
            $request->all(),
            [
                'name'=>'required',
                'file_id'=>'required',
            ]
          );  
          
          if($validator->fails())
          {
            return response()->json(['status'=>0 ,'error'=>$validator->errors()]);
          }else{
            $info= SiteSetting::find($request->id)->fill([
                'name'=>$request->name,
                'icon'=>$request->file_id,
                
            ])->save();
            return response()->json(['status'=> 1 , 'message' => $this->single_heading .' updated successfully']);
         
          }
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

    public function adminSite($id)
    {
        $info = SiteSetting::with('photo')->find($id);

        return view('admin.sitesetting.adminSite',['info'=>$info,'route'=>$this->route,'single_heading'=>$this->single_heading]); 
    }

    public function sitesettingAdmin(Request $request)
    {
        $info = SiteSetting::with('photo')->find($request->siteId);
        return view('admin.sitesetting.siteSetting',['info'=>$info,'route'=>$this->route,'single_heading'=>$this->single_heading]); 
    }

    public function siteSettingImage(Request $request)
    {
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

                SiteSetting::find($request->siteId)->fill([
                    'icon'=>$file_data->id,
                ])->save();

                return response()->json(['status' => 1, 'file_id' => $file_data->id, 'file_path' => asset($file_path . $file_data->file)]);

        }else{ 

            return response()->json(['status' => 0, 'msg' => 'File type not allowed']);
        }
    }


    public function siteSettingUpdate(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name'=>'required',
            ]
          );  
          
          if($validator->fails())
          {
            return response()->json(['status'=>0 ,'error'=>$validator->errors()]);
          }else{

            $info= SiteSetting::find($request->id)->fill([
                'name'=>$request->name,
            ])->save();

            return response()->json(['status'=> 1 , 'message' => $this->single_heading .' updated successfully']);
    
          }
    }

}
