<?php

namespace App\Http\Controllers;

use App\UsersModel;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\MessageBag;


class SettingsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');//check if we are login
    }


    public function worker_list(){
          
     return view('SystemWorkerView/WorkersListView')->with(compact('details'));
          
      }

      public function add_new_worker(){

        return view('SystemWorkerView/addNewWorkerView');
             
      }
      public function new_worker_post(Request $request){


       $data = $request->all();
       
       
       $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:3|confirmed',
        'phone' => 'required',
            
        ]);

        if ($validator->fails()) {
            return redirect('add_new_worker')
                ->withErrors($validator)
                ->withInput();
        }
        $res =  User::create([
          'name' =>  $data['name'],
          'email' => $data['email'],
          'phone'=>  isset($data['phone']) ? $data['phone'] : null,
          'password' => bcrypt($data['password']),
          'level' => ($data['level']=='admin' ? 1 : 2),
           ]);

      return view('SystemWorkerView/WorkersListView');
      }

      public function worker_list_json(Request $request){
        $params= $request->all();
        $search = null;
        $start = $params['start'];
        $limit = $params['length'];
        if(isset($params['search']['value'])){
            $search = params['search']['value'];
        }
        
 
        $response_data = array();
        
        $data = UsersModel::getListOfWorkers($start,$limit,$search);
        $countAll=UsersModel::count();
        foreach ($data as $row){
            $response_data[] = array(
                "name" => $row->name,
                "email" => $row->email,
                "phone" => $row->phone,
                "level" => $row->level==1 ? 'מנהל' : 'עובד רגיל',
                "created_date" => $row->created_at,
                "action"=> "<a href='/worker_settings/$row->id'>פרטים</a>");
        }
        $data = json_encode(
            array(
                "data"=>$response_data,
                "draw"=> $params['draw'],
                "recordsTotal"=>  $countAll,
                "recordsFiltered"=> $countAll,
            ));
    
        return $data;


        //$current_user_id = Auth::id();// get the current user id
        //$details = UsersModel::getUserDetails($current_user_id);
       // return view('SystemWorkerView/systemWorkerDetailsView')->with(compact('details'));
      
        }



        public function workerDetails($id=null)
        {
           //$current_user_id = Auth::id();// get the current user id
         $details = UsersModel::getUserDetails($id);
         return view('SystemWorkerView/systemWorkerDetailsView')->with(compact('details'));
      
      }
      
      
      
      
      
     }
