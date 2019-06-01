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



        public static function getCountOfUsers(Type $var = null)
        {
            # get the count of active users
            $res = DB::select("select count(1) as count from app_users where active = 1");
            if(!empty($res)){
                    return $res[0]->count;
            }
        }
}
