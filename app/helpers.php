<?php



use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
Use App\Hobbies;


if (! function_exists('getHobbyName')) {
    function getHobbyName($id)
    {
        return Hobbies::where('id',$id)->value('name');
    }
}