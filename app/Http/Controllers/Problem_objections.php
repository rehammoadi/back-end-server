<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objection;
use App\AnnouncementProblem;

class Problem_objections extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllProblemsObjections()
    {
        return view('admin/problemsObjectionsList');
    }

    //objections List
    public function getObjections_json(Request $request)
    {
        $params= $request->all();
        $search = null;
        $start = $params['start'];
        $limit = $params['length'];
        if(isset($params['search']['value'])){
            $search = params['search']['value'];
        }
        
 
        $response_data = array();
        $data = Objection::getObjections($start,$limit,$search);
        $countAll=Objection::count();
        foreach ($data as $row){
            $response_data[] = array(
                "user_name" => $row->name,
                "announcement_number" => $row->announcement_id,
                "block_number" => $row->block_number,
                "create_date" => $row->created_at,
                "action"=> "<a href='/view_objection_details/$row->id'>פרטים</a>");
        }
        $data = json_encode(
            array(
                "data"=>$response_data,
                "draw"=> $params['draw'],
                "recordsTotal"=>  $countAll,
                "recordsFiltered"=> count($response_data)
            ));
    
        return $data;
       
    }

    //problems list
    public function getProblems_json(Request $request)
    {
        $params= $request->all();
        $search = null;
        $start = $params['start'];
        $limit = $params['length'];
        if(isset($params['search']['value'])){
            $search = params['search']['value'];
        }
        
 
        $response_data = array();
   
        $data = AnnouncementProblem::getProblemsData($start,$limit,$search);
        $countAll = AnnouncementProblem::count();
        foreach ($data as $row){
            $response_data[] = array(
                "user_name" => $row->name,
                "announcement_number" => $row->announcement_id,
                "short_report" => $row->short_report,
                "create_date" => $row->created_at,
                "action"=> "<a href='/view_objection_details/$row->id'>פרטים</a>",
               

            );
        }
        $data = json_encode(array(
        "data"=>$response_data, 
        "draw"=> $params['draw'],
        "recordsTotal"=>  $countAll,
        "recordsFiltered"=> count($response_data)));
        return $data;
       
    }
}