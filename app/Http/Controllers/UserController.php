<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRequest;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $Repository;
    public function __construct(Repository $Repository)
    {
        $this->middleware('auth');
        $this->Repository = $Repository;
    }
    public function index()
    { 
        //GET users except login user
        $users  = $this->Repository->getUsers();
        //get hobbies 
        $hobbies  = $this->Repository->getHobbies($isprepend = 1);
        return view('users.index',compact('users','hobbies'));
    }

   
    public function send_request(Request $request)
    {
        $from_id = $request->from_id;
        $to_id = $request->to_id;
        $request_type = $request->request_type;
        $this->Repository->sendRequest($from_id,$to_id,$request_type);
    }
    public function search_user(Request $request)
    {
        $field_hobby = $request->field_hobby;
        $field_gender = $request->field_gender;
        $users = $this->Repository->searchUser($field_hobby,$field_gender);
        return view('users.list',compact('users'))->render();
    }
}
