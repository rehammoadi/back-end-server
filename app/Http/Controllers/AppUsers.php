<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiUser;

class AppUsers extends Controller
{
    //this controller for the app users


    public function __construct()
    {
        $this->middleware('auth');//check if we are login
    }


    //get apps users list
    public function appUsersList()
    {
        return View('admin/app_Users_List');
    }

 

    //get apps users list json
    public function appUsersList_json(Request $request)
    {
        
        $params= $request->all();
        $search = null;
        $start = $params['start'];
        $limit = $params['length'];
        if(isset($params['search']['value'])){
            $search = params['search']['value'];
        }
        
 
        $response_data = array();
      
        $data = ApiUser::getAppUsersList($start,$limit,$search);
        $countAll=ApiUser::count();
        foreach ($data as $row){
            $response_data[] = array(
                "full_name" => $row->name,
                "email" => $row->email,
                "phone" => $row->phone,
                "username" => $row->username,
                "active" => ($row->active==1?'פעיל' : 'לא פעיל'),
                "created_at" => $row->created_at,
                "action"=> "<a href='/view_app_user/$row->id'>פרטים</a>");
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



    public function getAppUserDetailsByID($id)
    {
        # get all details about the user
        $res = ApiUser::getUserDetailsByID($id);
        if(!empty($res)){
            return view('AppUsersView/AppUserView')->with(compact('res'));;
        }else{
            return array();
        }

    }
}
