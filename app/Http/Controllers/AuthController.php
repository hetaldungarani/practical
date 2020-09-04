<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Repositories\AuthRepository;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    private $AuthRepository;
    public function __construct(AuthRepository $AuthRepository)
    {
        $this->AuthRepository = $AuthRepository;
    }
    public function index()
    {
        return view('login');
    }  
    public function register()
    {
        $hobbies  = $this->AuthRepository->getHobbies();
        return view('register',compact('hobbies'));
    }
    public function postLogin(LoginRequest $request)
    {
        $credentials  = $this->AuthRepository->getCredentials($request);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('users');
        }
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    public function postRegister(UserRequest $request)
    {  
        $this->AuthRepository->createUser($request);
        return Redirect::to("users");
    }
   
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
