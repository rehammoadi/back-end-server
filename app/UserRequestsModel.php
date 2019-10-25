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
         "size"
     ];
   
 
 
     
     //get objections to dataTable
     public static function getUsersRequest($start = 0 , $length = 20 , $search=null){
         $sql_query = "SELECT us.id , us.user_ID , au.name , us.mespar_helka , us.mespar_gosh , us.size ,concat(SUBSTRING(us.description , 1, 15),'...') AS short_text , us.created_at  , us.status FROM user_request us 
         inner JOIN app_users au on(au.id = us.app_user_id)";
         $params = array();
         $sql_query .=" limit $length OFFSET $start";
         $r = DB::select($sql_query,array($start,$length));
         return $r;
     }


     public static function getRequest_by_id($id){
         $sql_query = "SELECT us.*,au.name  FROM user_request us 
         inner JOIN app_users au on(au.id = us.app_user_id)
         where us.id = ?";

         $r = DB::select($sql_query,array($id));
         return $r;
     }

     public static function update_Request_by_id($status,$req_id){
        $sql_query = "UPDATE `user_request` SET `status`=? WHERE `id` =?";

        $r = DB::update($sql_query,array($status,$req_id));
        return $r;
    }

     




}
