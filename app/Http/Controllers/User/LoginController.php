<?php

namespace App\Http\Controllers\User;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;

use App\Lib\Enumerations\UserStatus;
use App\Lib\Enumerations\UserTypes;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;


class LoginController extends Controller
{


    public function index()
    {
        if(Auth::check()){
            return redirect()->intended(url('/dashboard'));
        }
        return view('admin.login');
    }


    public function Auth(LoginRequest $request)
    {
        if (Auth::attempt(['email'=>$request->user_name,'password'=>$request->user_password])) {
                $user_data = [
                    "id"       => Auth::user()->id,
                    "name"       => Auth::user()->name,
                    "email"     => Auth::user()->email,
                    "user_type"       => Auth::user()->user_type,
                ];


                session()->put('logged_session_data', $user_data);
                return redirect()->intended(url('/dashboard'));

        }else {
            return redirect(url('/'))->withInput()->with('error','User name or password does not matched');
        }
    }


    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect(url('/'))->with('success','logout successful ..!');
    }


}
