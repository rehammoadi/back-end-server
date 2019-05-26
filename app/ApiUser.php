<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
            "password"
        ];


}
