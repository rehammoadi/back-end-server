<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UserRequestsModel;
class UserRequests extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//check if we are login
    }


    public function getAllUserRequests()
    {
        return view('admin/users_requestsList');
    }


    public function getAllUserRequests_json(Request $request)
    {
        $params= $request->all();
        $search = null;
        $start = $params['start'];
        $limit = $params['length'];
        if(isset($params['search']['value'])){
            $search = params['search']['value'];
        }
        
 
        $response_data = array();
       
        $data = UserRequestsModel::getUsersRequest($start,$limit,$search);
        $countAll=UserRequestsModel::count();
        foreach ($data as $row){
            $response_data[] = array(
                "full_name" => $row->name,
                "user_ID" => $row->user_ID,
                "mespar_helka" => $row->mespar_helka,
                "mespar_gosh" => $row->mespar_gosh,
                "size" => $row->size,
                "short_text" => $row->short_text,
                "created_at" => $row->created_at,
                "action"=> "<a href='/view_request_details/$row->id'>פרטים</a>",
                "req_status"=>$row->created_at==1 ? "טופל" : "לא טופל",
            );
        }
        $data = json_encode(
            array(
                "data"=>$response_data,
                "draw"=> $params['draw'],
                "recordsTotal"=>  $countAll,
                "recordsFiltered"=> $countAll
            ));
    
        return $data;
    }


    public function getRequestById($id=null)
    {

       if(!is_null($id)){
          $res = UserRequestsModel::getRequest_by_id($id);
          if(!empty($res)){
            return view('requestDetailsView')->with(compact('res'));;
        }else{
            return view('admin/problemsObjectionsList');
        }
           
       }else{
          return view('admin/problemsObjectionsList');
       }
    }
}
