<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcements;
use App\ApiUser;
use App\AnnouncementProblem;
use App\Objection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $res = $this->getIndexDetails();

        return view('admin/rtl')->with(compact('res'));;
    }

    //get the data to the home page 
    public function getIndexDetails()
    {
        $data = [
            'number_of_notices'=>0,
            'number_of_users'=>0,
            'last_notices'=>[],
            'last_users'=>[],
            'user_requests'=>0,
            'user_problems_objections'=>0,
        ];
       
        //get the number of notices in the system
        $data['number_of_notices']  = Announcements::getCountOfNotices_home();

        //get the number of number of users in the system [app users]
        $data['number_of_users']  = ApiUser::getCountOfUsers();
        
        //get the x last notices 
        $data['last_notices']  = Announcements::getLastNotices_home();

        //get the x last users regestred to the app
        $data['last_users']  = ApiUser::getLastRegUsers();

     
         $data['user_problems_objections']  = AnnouncementProblem::count() + Objection::count();


        //

        return $data;
    }
}
