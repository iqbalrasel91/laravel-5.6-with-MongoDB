<?php

namespace App\Http\Controllers\User;

use App\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ChangePasswordRequest;


class ChangePasswordController extends Controller
{

    public function index()
    {
        return view('admin.user.changePassword');
    }


    public function update(ChangePasswordRequest $request,$id)
    {
        $input['password'] = Hash::make($request['password']);
        if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->oldPassword])){
               User::where('_id', Auth::user()->id)->update($input);
              return redirect()->back()->with('success', 'Password successfully updated.');
        }else{
            return redirect()->back()->with('error', 'Old Password does not match.');
        }
    }
}
