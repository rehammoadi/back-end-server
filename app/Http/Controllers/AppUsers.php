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



    public function getAppUserDetailsByID($id)
    {
        # get all details about the user
        $res = ApiUser::getUserDetailsByID($id);
        if(!empty($res)){
            return view('AppUserView')->with(compact('res'));;
        }else{
            return array();
        }

    }
}
