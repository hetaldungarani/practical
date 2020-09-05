<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Repositories\Repository;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    private $Repository;
    public function __construct(Repository $Repository)
    {
        $this->Repository = $Repository;
    }
    public function index()
    {
        return view('login');
    }  
    public function register()
    {
        $hobbies  = $this->Repository->getHobbies($isprepend = 0);
        return view('register',compact('hobbies'));
    }
    public function postLogin(LoginRequest $request)
    {
        $credentials  = $this->Repository->getCredentials($request);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('users');
        }
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    public function postRegister(UserRequest $request)
    {  
        $this->Repository->createUser($request);
        return Redirect::to("users");
    }
   
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
