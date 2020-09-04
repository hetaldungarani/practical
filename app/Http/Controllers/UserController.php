<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRequest;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        # code...
    }
    public function index()
    {   /*$request_type = UserRequest::where('from_id', Auth::id())->value('request_type');
        if($request_type == 1){
            $request_value = 'Request Sent';
        }
        else if($request_type == 2){
            $request_value = 'Accept';
        }
        else if($request_type == 3){
             $request_value = 'Your friend';
        }
        else if($request_type == 4){
            $request_value = 'Blocked';
        }
        else{
             $request_value = 'Send Request';
        }*/
        $users = User::with('hobbies')->where('id', '!=', auth()->id())->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function send_request(Request $request)
    {
        $from_id = $request->from_id;
        $to_id = $request->to_id;
        $request_type = $request->request_type;

        $user_request = new UserRequest;
        $user_request->from_id = $from_id;
        $user_request->to_id = $to_id;
        $user_request->request_type = $request_type;
        $user_request->is_latest = 1;
        $user_request->save();
    }
}
