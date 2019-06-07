<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ApiUser;
use Illuminate\Database\QueryException;
use App\Announcements;
use App\Objection;
use Illuminate\Support\Facades\DB;
use App\AnnouncementProblem;

class BaseApi extends Controller
{
    public function signup_new_user(Request $request)
    {
        $params= $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                'userData'=>[
                        'error'=>false,
                       // 'user_email'=>$req['email'],
                ]
            ));
        }

        $data = array(
            "name"=>htmlentities(strip_tags($params['name'])),
            "username" => htmlentities(strip_tags($params['username'])),
            "email" => htmlentities(strip_tags($params['email'])),
            "phone" => htmlentities(strip_tags($params['phone'])),
            "password" => htmlentities(strip_tags($params['password']))
          );
          $user = new ApiUser(
              $data
          );



          try{
                    // insert the entry
                    $user->save();
                    $id = DB::getPdo()->lastInsertId();
                    $data['true'] = true;
                    $data['id'] =  $id;
                 
                    return response()->json(array(
                        'userData'=>$data
                    ));
             }catch (QueryException $e) {
                         return response()->json(array(
                   'userData'=>[
                        'true'=>false
                     ]
            ));
         }

    }

    public function login_user(Request $request)
    {
        $params= $request->all();

        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                'userData'=>[
                        'error'=>false
                ]
            ));
        }

        $data = array(
            "username" => htmlentities(strip_tags($params['username'])),
            "password" => htmlentities(strip_tags($params['password']))
          );
          try{
                    $user =  ApiUser::login_process($data);//::where('username', $data['username'])->first();
                    if(!empty($user)){
                         
                            if($user->password == $data['password']){
                                $user->isOk=true;//dynamic var
                                return response()->json(array(
                                    'userData'=>$user
                                ));
                            }
                    }else{
                        //not exist
                                return response()->json(array(
                                    'userData'=>[]
                                ));
                    }
                   
             }catch (QueryException $e) {
                         return response()->json(array(
                   'userData'=>[
                        'true'=>false
                     ]
            ));
         }

    }

    //get Last Notices function

    public function getLastNotices(Request $request){

        $data = $request->all();

        //check if valid requet
       // if(isset($data['fromApp']) && $data['fromApp']==true){

            $lastData = Announcements::getLastNotices();
           
            return response()->json(
               
                    ["lastNotices"=>$lastData]
                    
    
            );
       // }
       
    }

    //new new_objection
    public function NewObjection(Request $request){

        $params= $request->all();
        $data = array(
            "block_number"=>htmlentities(strip_tags($params['block_number'])),
            "name_req" => htmlentities(strip_tags($params['name_req'])),
            "cause_text" => htmlentities(strip_tags($params['cause_text'])),
            "app_user_id" => htmlentities(strip_tags($params['app_user_id'])),
            "announcement_id" => $params['id'],

          );
          $objection = new Objection(
              $data
          );



          try{
                    $objection->save();
                    $objection['ok'] = true;
                    return response()->json(array(
                        'objection'=>$objection
                    ));
             }catch (QueryException $e) {
                 return $e;
                         return response()->json(array(
                   'objection'=>[
                        'true'=>false
                     ]
            ));
         }
    }

    //NewProblemInAnnouncement
    public function NewProblemInAnnouncement(Request $request){
        $params= $request->all();
        $data = array(
            "app_user_id"=>htmlentities(strip_tags($params['app_user_id'])),
            "full_name" => htmlentities(strip_tags($params['full_name'])),
            "id_announcement" => htmlentities(strip_tags($params['id_announcement'])),
            "problem_text" => htmlentities(strip_tags($params['problem_text'])),
          );



          $obj = new AnnouncementProblem(
            $data
        );



        try{
            $obj->save();
            $obj['ok'] = true;
                  return response()->json(array(
                      'AnnouncementProblem'=>$obj
                  ));
           }catch (QueryException $e) {
               return $e;
                       return response()->json(array(
                 'AnnouncementProblem'=>[
                      'error'=>false
                   ]
          ));
       }

    }
}
