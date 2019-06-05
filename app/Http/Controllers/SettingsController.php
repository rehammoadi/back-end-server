<?php

namespace App\Http\Controllers;

use App\UsersModel;
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


    public function userDetails(){
            $current_user_id = Auth::id();// get the current user id
            $details = UsersModel::getUserDetails($current_user_id);
           // $data = Announcements::getAnnouncementByid($id);
           // if(!empty($data)){
            return view('userSettings')->with(compact('details'));
           // }else{
             //   echo 'not exit';
           // }
      }

    

}
