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
              "note",
              "pic_full_name"
    ];



    // custom query if needed!
    public static function save_new_announcement($data){



               /* DB::table('announcements')->insert(
                        "INSERT INTO "

                );*/

                   /* DB::table('users')->insert(
                        ['email' => 'john@example.com', 'votes' => 0]
                    );*/

    }

    public static function update_announcement($data){
        $custom = "";
        if(empty($data)){
            return false;
        }
        if(isset($data['pic_full_name'])){
            $custom = " , `pic_full_name`= ? " ;
        }

        $sql_query_update = "
        UPDATE announcements 
        set 
        `title` = ? , 
        `mespar_tokhnet` = ? ,
        `area`= ?,
        `merhav_tekhnon`= ?,
        `city`= ?,
        `address`= ?,
        `doc_number`= ?,
        `block_number`= ?,
        `helka`= ?,
        `description`= ?,
        `note`= ?
        $custom
          WHERE id = ?
        ";
        $bin_params = array(
            $data['title'],
            $data['mespar_tokhnet'],
            $data['area'],
            $data['merhav_tekhnon'],
            $data['city'],
            $data['address'],
            $data['doc_number'],
            $data['block_number'],
            $data['helka'],
            $data['description'],
            $data['note']
        );
        if(isset($data['pic_full_name'])){
            $bin_params[] = $data['pic_full_name'];
        }

        $bin_params[] = $data['id'];
         DB::statement($sql_query_update,$bin_params);
         return true;

    }


    //get announcement to dataTable
    public static function getAnnouncement($start = 0 , $length = 20 , $search=null){
        $sql_query = "select * from announcements";
        $params = array();
//        if (!is_null($search)){
//            $sql_query.= " Where title = ? OR mespar_tokhnet=? OR area =?";
//            $params[] =
//        }

       // $params = array_merge();
        $sql_query .=" limit $length OFFSET $start";
        $r = DB::select($sql_query,array($start,$length));
        return $r;
    }

    //get announcement to view by id
    public static function getAnnouncementByid($id){
        $sql_query = "select * from announcements where id=?";
        $r = DB::select($sql_query , array($id));
        return $r;
    }
}
