<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{Pages,Upload ,Companies,SubCategory,CompanyInfo,CommissionSetting};
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $route;

    protected $single_heading;

    public function __construct()
    {
          $this->route = new \stdClass;
          $this->single_heading = "company";
          $this->route->list = route('admin.companie.list');
          $this->route->add = route('admin.companie.add');
          $this->route->store = route('admin.companie.store');
        //   $this->route->edit = route('admin.companie.edit',''); 
          $this->route->edit = route('admin.companie.edit',':id');
          $this->route->destroy = route('admin.companie.destroy',':id');
          $this->route->imagepdf = route('admin.companie.imagepdf'); 
          $this->route->saveimage = route('admin.companie.saveimage'); 
          $this->route->status = route('admin.companie.status'); 
    }

    public function index()
    {
      // echo $route;die;
    //   $commissionValue = showcommission('commission');
           return view('admin.companie.index',['route'=>$this->route, 'single_heading'=>$this->single_heading]);
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
       

        $qry = CompanyInfo::with('user') ->where('company_name', 'LIKE', '%' . $searchValue . '%')->whereHas('user', function($query) {
            $query->where('role', 2);
        });
        $result = $qry->get();
  
        // echo "<pre>";print_r($result);die;
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

              $status_url = $this->route->status;
              $status = '<div class="form-check form-switch">
                <input class="form-check-input toggle-class" type="checkbox" data-id="'.$row->id.'" '.($row->status == 1 ? 'checked' : '').' onclick="status_change(\''.$status_url.'\', this.checked ? 1 : 0, '.$row->id.', this)">
                </div>';

                
    
         
              $data[] = array(
                  "sno" => $i,
                  "name"=>ucfirst($row->company_name),
                  "phone"=>$row->compan_phone,
                  "address"=>$row->address,
                  "rating"=>$row->avg_rating,
                //   "status"=>$status,
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

    public function store(Request $request)
    {

        // echo "<pre>";print_r($request->all());die;

        if($request->id){
            return $this->update($request);
            }else{
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                   'password' => 'required',
                    'phone'=> ['required', 'string', 'min:11'],
                    'address'=>'required',
                    'profile_image'=>'required',
                    'pdf_file'=>'required',
                ]
            );

         if($validator->fails()){
                    return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
                }else{

                    $info = Companies::create([
                        'name'=>$request->name,
                        'email'=> $request->email,
                        'password' => Hash::make($request->password),
                        'phone'=>$request->phone,
                        'address'=>$request->address,
                        'status'=>$request->status,
                        'file_id'=>$request->profile_image,
                        'register'=>$request->pdf_file,
                    ]);

                     
                    
                    return response()->json(['status' => 1, 'message' => $this->single_heading .'saved successfully']);
                };
            }
    }

    public function add()
    {
        return view('admin.companie.add',['route'=>$this->route,'single_heading'=>$this->single_heading]);
    }

    public function status(Request $request)
    {
   
        $status = Companies::find($request->id);
        $status->status = $request->status;
        $status->save();
        return response()->json(['success' => 1, 'message' => $this->single_heading . ' status changed successfully']);
    }

    public function edit($id)
    {
        $info = Companies::find($id);

        return view('admin.companie.edit',['route'=>$this->route,'single_heading'=>$this->single_heading, 'info'=>$info]);
    }

    public function update(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;

        $validator = Validator::make(
            $request->all(),
            [
                'name'=>'required',
                'email' => 'required',
                'phone'=> ['required', 'string', 'min:11'],
                'address'=>'required',
                'profile_image'=>'required',
                'pdf_file'=>'required',
            ]
          );  
          
          if($validator->fails())
          {
            return response()->json(['status'=>0 ,'error'=>$validator->errors()]);
          }else{
            $info= Companies::find($request->id)->fill([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'status'=>$request->status,
                'file_id'=>$request->profile_image,
                'register'=>$request->pdf_file,
                
            ])->save();
            return response()->json(['status'=> 1 , 'message' => $this->single_heading .' updated successfully']);
         
          }
    }

    public function imagepdfuplode(Request $request)
    {
        $type = $request->type;
        $path = $type . '_path';
        $name = $type . '_name';
        $file_name = $request->$name;
        $file_path = $request->$path;
        $file = $request->file('image_pdf');

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


    public function imageupload(Request $request)
    {
    //    echo "<pre>";print_r($request->all());die;

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

    public function destroy($id)
    {
  
        $delt = Companies::destroy($id);
          return response()->json(['status'=>1, 'message' => $this->single_heading . ' deleted successfully']);
    }

    public function addCommission(Request $request)
    {

       if(!empty($request->commission_key) && !empty($request->commission_value)){

        $commissionData = CommissionSetting::where('meta_key',$request->commission_key)->first();
        $commissionData->meta_value = $request->commission_value;
        $commissionData->save();

       
        return response()->json(['status'=>1, 'message' => 'Commission update successfully']);
       }else
       {
        return response()->json(['status'=>2, 'message' => 'Commission field is required']);
       }

    }

}

