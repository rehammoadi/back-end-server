<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Announcements extends Model
{
    //

    /**
     * The table associated with the model.
     *
     * @var string
     *
     * not require
     */
     protected $table = 'announcements';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     * This for security
     */
    protected $fillable = [
              "user_created" ,
              "title"  ,
              "mespar_tokhnet"  ,
              "area"  ,
              "merhav_tekhnon" ,
              "city" ,
              "address"  ,
              "doc_number",
              "block_number",
              "helka" ,
              "description",
              "note"
    ];



    // custom query if needed!
    private static function save_new_announcement($data){



               /* DB::table('announcements')->insert(
                        "INSERT INTO "

                );*/

                   /* DB::table('users')->insert(
                        ['email' => 'john@example.com', 'votes' => 0]
                    );*/

    }

    //get announcement to dataTable
    public static function getAnnouncement($start = 0 , $length = 20 , $search=null){
        $sql_query = "select * from announcements";
        if (!is_null($search)){
            $sql_query.= " Where ";
        }

        $sql_query .=" limit $length OFFSET $start";
        $r = DB::select($sql_query,array($start,$length));
        return $r;
    }
}
