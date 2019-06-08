<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Objection extends Model
{
    //
    protected $table = 'objection';
    protected $fillable = [
        "block_number",
        "name_req" ,
        "cause_text" ,
        "app_user_id",
        "announcement_id"
    ];



    
    //get objections to dataTable
    public static function getObjections($start = 0 , $length = 20 , $search=null){
        $sql_query = "SELECT o.id  , au.name as name, o.block_number as block_number ,o.announcement_id , o.created_at FROM objection o 
                      inner JOIN app_users au on(au.id = o.app_user_id)";
        $params = array();
        $sql_query .=" limit $length OFFSET $start";
        $r = DB::select($sql_query,array($start,$length));
        return $r;
    }
}
