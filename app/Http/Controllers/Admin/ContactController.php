<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User,State,City,Favorite,Appointment, AppointmentDetaile,Upload,Contact};
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    protected $route;

    protected $single_heading;
   public function __construct()
   {

    $this->route = new \stdClass;
    $this->single_heading = "Contact";
    $this->route->list = route('admin.contact.list');
   }

   public function index()
   {
    return view('admin.contact.index',['single_heading'=>$this->single_heading, 'route'=> $this->route]);
   }

   public function list()
   {
      ## Read value
      $draw = $_POST['draw'];
      $row = $_POST['start'];
      $rowperpage = $_POST['length']; 
      $columnIndex = $_POST['order'][0]['column']; 
      $columnName = $_POST['columns'][$columnIndex]['data'];
      $columnSortOrder = $_POST['order'][0]['dir']; 
      $searchValue = $_POST['search']['value']; 

      $qry = Contact::orderBy($columnName, $columnSortOrder)->where('name', 'LIKE', '%' . $searchValue . '%')->orWhere('message', 'LIKE', '%' . $searchValue . '%');
      $result = $qry->get();

      $totalRecordwithFilter = $totalRecords = $qry->count();
      $result = $qry->offset($row)->take($rowperpage)->get();
      $data = array();
      $i = 1;

        foreach ($result as $row) {

            // $edit_url = $this->route->edit;
            // $destroy = $this->route->destory;
            // $action = '<div class="d-flex  order-actions">';
            // $action .= '<a href="javascript:void(0);" onclick=edit_row("'.$edit_url.'",'.$row->id.');><i class="la-user-edit la"></i></a>';
            // $action .= '&nbsp;&nbsp;<a href="javascript:void(0);"onclick=delete_row("'.$destroy.'",'.$row->id.')><i class="feather icon-trash-2"></i></a>';
            // $action .= '</div>';

            // $status_url = $this->route->status;

            //   $status = '<div class="form-check form-switch">
            //   <input class="form-check-input toggle-class" type="checkbox" data-id="'.$row->id.'" '.($row->status = 1 ? 'checked' : '').' onclick="status_change(\''.$status_url.'\', this.checked ? 1 : 0, '.$row->id.', this)">
            //   </div>';

            // $file='';
            // if ($row->photo) {
            //     $file = '<img src="' . asset('uploads/services/' . @$row->photo->file) . '" class="img-fluid table-image" alt="" width="50" height="50" >';
            // }


            $data[] = array(
                "sno" => $i,
                "name"=>ucfirst($row->name),
                "message"=>$row->message,
                // "action" => $action,
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
    return view('admin.user.add',['route'=>$this->route,'single_heading'=>$this->single_heading]);
   }

   public function userStateData(Request $request)
   {
    $cities = City::select('id','name','latitude','longitude')->where('state_id',$request->id)->get();
        // echo "<pre>"; print_r($cities->toArray()); die;
       
        $options =  "<option value=''>Select Cities ... </option>";
        foreach($cities as $city)
        {
            $options .="<option value='{$city->id}'>{$city->name}</option>";
        }
        return response()->json(['cities'=> $options]);
   }

   public function edit($id)
   {
        $info = User::find($id);
       
       return view('admin.user.edit',['info'=>$info,'route'=>$this->route,'single_heading'=>$this->single_heading]);
   }

   public function update(Request $request)
   {
      $validator = Validator::make(
        $request->all(),
        [
            'name'=>'required',
            'email'=>'required',
            'phone'=> ['required', 'string', 'min:11'],
            'image'=>'required',
        ]
      );  
      
      if($validator->fails())
      {
        return response()->json(['status'=>0 ,'error'=>$validator->errors()]);
      }else{
        $info= User::find($request->id)->fill([
            'name'=> $request->name,
                'email'=> $request->email,
                'image'=> $request->image,
                'status'=>$request->status,
                'mobile_number'=>$request->phone,
        ])->save();
        return response()->json(['status'=> 1 , 'message' => $this->single_heading .' updated successfully']);

      }
   }


   public function destroy($id)
   {
     $delt= User::destroy($id);
     return response()->json(['status'=>1, 'message' => $this->single_heading . ' deleted successfully']);
   }




}
