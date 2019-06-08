<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class UserRequestsModel extends Model
{
     //
     protected $table = 'user_request';

     protected $fillable = [
         "app_user_id",
         "user_ID" ,
         "full_name" ,
         "mespar_helka",
         "mespar_gosh",
         "description",
         "cost",
     ];
 
 
 
     
     //get objections to dataTable
     public static function getUsersRequest($start = 0 , $length = 20 , $search=null){
         $sql_query = "SELECT us.id , us.user_ID , au.name , us.mespar_helka , us.mespar_gosh , us.size ,concat(SUBSTRING(us.description , 1, 15),'...') AS short_text , us.created_at  FROM user_request us 
         inner JOIN app_users au on(au.id = us.app_user_id)";
         $params = array();
         $sql_query .=" limit $length OFFSET $start";
         $r = DB::select($sql_query,array($start,$length));
         return $r;
     }
}
