<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
