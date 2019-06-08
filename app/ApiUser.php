<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApiUser extends Model
{
    //

    protected $table = 'app_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     * This for security
     */
    protected $fillable = [
       
            "name",
            "username" ,
            "email" ,
            "phone",
            "password"
        ];


        public static function login_process($data){
                # get the count of active users
                $res = DB::select("select * from app_users where username = ? AND password =?",array($data['username'],$data['password']));
                if(!empty($res[0])){
                        return $res[0];
                }else{
                    return false;
                }
        }
        public static function getCountOfUsers()
        {
            # get the count of active users
            $res = DB::select("select count(1) as count from app_users where active = 1");
            if(!empty($res)){
                    return $res[0]->count;
            }else{
                return 0;
            }
        }

        public static function getLastRegUsers()
        {
            # get the count of active users
            $res = DB::select("
            select * from app_users where active = 1 
            order by created_at desc
            limit 5");
            if(!empty($res)){
                    return $res;
            }else{
                return array();
            }
        }


        //get all details about user by id
        public static function getUserDetailsByID($id=null){
           
           
            if(!is_null($id)){
                    
                $res = DB::select("
                select * from app_users where id=?" , array($id));
                if(!empty($res)){
                        return $res;
                }else{
                    return array();
                }

    
            }
          

        }

        //admin sections

        public static function getAppUsersList($start=0,$limit=20,$search=null)
        {
            $sql_query = "SELECT * FROM app_users";
            $params = array();
            $sql_query .=" limit $limit OFFSET $start";
            $r = DB::select($sql_query);
            return $r;
        }
        
}
