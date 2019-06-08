<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','level','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function new_worker($data=null)
    {
        $query="INSERT INTO `users`(`name`, `email`, `password`, `phone`, `level`) VALUES ('ronenamon','email@email.com','12312312','0525106663',2)";

        // 'name' =>  $data['name'],
        //   'email' => $data['email'],
        //   'phone'=>  isset($data['phone']) ? $data['phone'] : null,
        //   'password' => bcrypt($data['password']),
        //   'level' => ($data['level']=='admin' ? 1 : 2),
    }
}
