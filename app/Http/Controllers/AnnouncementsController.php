<?php

namespace App\Http\Controllers;

use App\Announcements;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AnnouncementsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function new_Announcements(){
        return view('newAnnouncement');
    }

    public function add_new_Announcements(Request $request){
            $params= $request->all();

            $validator = Validator::make($request->all(), [
                'title' => 'required|max:4',
                'mespar_tokhnet' => 'required',
            ]);

            if ($validator->fails()) {


                return redirect('new_announcement')
                    ->withErrors($validator)
                    ->withInput();
            }



        $data = array(
              "user_created"=>Auth::id(),
              "title" => htmlentities(strip_tags($params['title'])),
              "mespar_tokhnet" => htmlentities(strip_tags($params['number'])),
              "area" => htmlentities(strip_tags($params['area'])),
              "merhav_tekhnon" => htmlentities(strip_tags($params['merhav_tekhnon'])),
              "city" => htmlentities(strip_tags($params['city'])),
              "address" => htmlentities(strip_tags($params['address'])),
              "doc_number" => htmlentities(strip_tags($params['doc_number'])),
              "block_number" => htmlentities(strip_tags($params['block_number'])),
              "helka" => htmlentities(strip_tags($params['helka'])),
              "description" => htmlentities(strip_tags($params['description'])),
              "note" => htmlentities(strip_tags($params['note'])),
            );
            $obj = new Announcements(
                $data
            );
            $obj->save();



            return $obj;
           // Announcements::save_new_announcement($data);
            // Validate the request...

           /* $flight = new Flight;

            $flight->name = $request->name;

            $flight->save();*/


    }

    public function get_list_of_Announcements(){

       // $data = Announcements::all();

        //return $data;

        return view('ListOfAnnouncement');//->with("ann_arr" , $data);

    }

    public function get_list_of_Announcements_json(Request $request){

        $params= $request->all();
        $search = null;
        $start = $params['start'];
        $limit = $params['length'];
        if(isset($params['search']['value'])){
            $search = params['search']['value'];
        }

        $response_data = array();
        $data = Announcements::getAnnouncement($start,$limit,$search);
        foreach ($data as $row){
            $response_data[] = array(
                "title" => $row->title,
                "area" => $row->area,
                "city" => $row->city,
                "action"=> "<a href='/edit_announcement/$row->id'>פרטים</a>");
        }
        $data = json_encode(array("data"=>$response_data));
        return $data;
    }

    public function get_Announcements_by_id($id){
        echo $id;
    }

}
