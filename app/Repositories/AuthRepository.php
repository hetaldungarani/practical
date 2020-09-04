<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
Use App\Hobbies;
Use App\User;
Use App\UserHobby;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class AuthRepository 
{
    
    public function __construct()
    {
       
    }
    public function getHobbies()
    {
    	$hobbies = Hobbies::pluck('name','id');
    	return $hobbies;
    }
    public function createUser($request)
    {
	    $user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->gender = $request->gender;
		$user->save();

		foreach($request->hobbies as $hobby)
        {
        	$user_hobbies = new UserHobby;
       		$user_hobbies->user_id = $user->id;
       		$user_hobbies->hobby_id = $hobby;
       		$user_hobbies->save();
        }
    }
    public function getCredentials($request)
    {
    	$credentials = $request->only('email', 'password');
    	return $credentials;
    }
}
