<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
