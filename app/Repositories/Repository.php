<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
Use App\Hobbies;
Use App\User;
Use App\UserRequest;
Use App\UserHobby;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;

class Repository 
{
    
    public function __construct()
    {
       
    }
    public function getHobbies($isprepend)
    {
        if($isprepend == 1){
        	$hobbies = Hobbies::pluck('name','id')->prepend('Select Hobbies',' ');
        }
        else{
            $hobbies = Hobbies::pluck('name','id');
        }
    	return $hobbies;
    }
    public function createUser($request)
    {
        //insert user in user table
	    $user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->gender = $request->gender;
		$user->save();

        //insert hobbies into table in normlization form
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
    public function getUsers()
    {
        $users = User::with('hobbies')->where('id', '!=', auth()->id())->get();
        return $users;
    }
    public function sendRequest($from_id,$to_id,$request_type)
    {
        $user_ids = [$from_id,$to_id];
        UserRequest::whereIn('from_id',$user_ids)->whereIn('to_id',$user_ids)->update(['is_latest'=>0]);

        $user_request = new UserRequest;
        $user_request->from_id = $from_id;
        $user_request->to_id = $to_id;
        $user_request->request_type = $request_type;
        $user_request->is_latest = 1;
        $user_request->save();
    }
    public function searchUser($field_hobby,$field_gender)
    {
        
        $users = User::with('hobbies')->where('id', '!=', auth()->id());
        if($field_gender != ''){
            $users = $users->where('gender',$field_gender);
        }
        if($field_hobby != ''){
            $users = $users->whereHas('hobbies', function($q)use($field_hobby)
            {
                $q->where('hobby_id', '=', $field_hobby);

            });
        }
       
        $users = $users->get();
        
        return $users;
    }
}

