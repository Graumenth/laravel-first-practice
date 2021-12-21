<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post(){
        return $this->hasOne('App\Example_model'); //default olarak user_id bakıyor. Başka bir şey için ikinci parametreye yazılıyor. hasOne('App\Post', noob_id) gibi.
    }

    public function posts(){
        return $this->hasMany('App\Example_model');
    }

    public function roles(){
        return $this->belongsToMany('App\Role')->withPivot('created_at');
//        return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    }
}
