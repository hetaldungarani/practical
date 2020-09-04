<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
     protected $fillable = [
        'name', 'email', 'password','gender',
    ];
    public function getGenderAttribute($value)
    {
       $gender =  ($value == 1) ? 'Male' : 'Female';
       return $gender;
    }
    public function hobbies()
    {
    	return $this->hasMany('App\UserHobby','user_id');
    }
}
