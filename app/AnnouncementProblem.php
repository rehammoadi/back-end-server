<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnnouncementProblem extends Model
{
    //
    protected $table = 'announcementProblems';
    protected $fillable = [
        "app_user_id",
        "full_name" ,
        "id_announcement" ,
        "problem_text",
    ];


    public  static function getProblemsData($start = 0 , $length = 20 , $search=null)
    {
        $sql_query = "SELECT ap.id , au.name, ap.id_announcement as announcement_id ,SUBSTRING(ap.problem_text, 1, 15) AS short_report, ap.created_at ,ap.status FROM announcementProblems ap
                      inner JOIN app_users au on(au.id = ap.app_user_id)";
        //$params = array();
        $sql_query .=" limit $length OFFSET $start";
        $r = DB::select($sql_query,array($start,$length));
        return $r;
    }

       //get objections by id
       public static function getProblem_byId($id){
        $sql_query = "SELECT ap.* , au.name FROM announcementProblems ap 
                      INNER JOIN app_users au on(au.id = ap.app_user_id)
                      where ap.id = ?";
       
        $r = DB::select($sql_query,array($id));
        return $r;
    }

    //update_problem

    //update status for problem
    public static function update_problem($status,$id){
        $sql_query = "UPDATE `announcementProblems` SET `status`= ? WHERE id = ?";
        $r = DB::statement($sql_query,array($status,$id));
        return $r;
    }
}
