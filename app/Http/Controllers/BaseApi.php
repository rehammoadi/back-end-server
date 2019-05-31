<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ApiUser;
use Illuminate\Database\QueryException;
use App\Announcements;

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
                    $data['true'] = true;
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
                    $user =  ApiUser::where('username', $data['username'])->first();
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
}
