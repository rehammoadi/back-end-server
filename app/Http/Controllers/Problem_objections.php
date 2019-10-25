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
                "action"=> "<a href='/view_objection_details/$row->id'>פרטים</a>",
                "processed"=>$row->processed==1 ? "טופל" : "לא טופל"
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
                "action"=> "<a href='/view_problem_details/$row->id'>פרטים</a>",
                "status"=>$row->status==1 ? "טופל" : "לא טופל"
               

            );
        }
        $data = json_encode(array(
        "data"=>$response_data, 
        "draw"=> $params['draw'],
        "recordsTotal"=>  $countAll,
        "recordsFiltered"=> $countAll
        ));
        return $data;
       
    }


    public function getObjectionById($id=null)
    {

        

       if(!is_null($id)){
          $res = Objection::getObjection_byId($id);
          if(!empty($res)){
            return view('ObjectionsView/ObjectionDetailsView')->with(compact('res'));;
        }else{
            return view('admin/problemsObjectionsList');
        }
           
       }else{
          return view('admin/problemsObjectionsList');
       }
    }

    public function getProblemById($id=null)
    {

        

       if(!is_null($id)){
          $res = AnnouncementProblem::getProblem_byId($id);
          if(!empty($res)){
            return view('ProblemsView/ProblemDetailsView')->with(compact('res'));;
        }else{
            return view('admin/problemsObjectionsList');
        }
           
       }else{
          return view('admin/problemsObjectionsList');
       }
    }

    public function objectionProcessed(Request $request){

        $data= $request->all();
        $res = Objection::updateObjectionStatus($data['strState'],$data['obj_id']);
        
        if($res){
            return ['status'=>true];
        }else{
            return ['status'=>false];
        }
    }

    public function objection_hahlata(Request $request){

        $data= $request->all();
        $res = Objection::updateObjection_hahlata($data['hahlata'],$data['id']);
        
        if($res){
            return ['status'=>true];
        }else{
            return ['status'=>false];
        }
    }


    public function update_problem(Request $request){

        $data= $request->all();
        $res = AnnouncementProblem::update_problem($data['strState'],$data['problem_id']);
        
        if($res){
            return ['status'=>true];
        }else{
            return ['status'=>false];
        }
    }
}
