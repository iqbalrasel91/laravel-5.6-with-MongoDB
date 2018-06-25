<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Lib\Enumerations\UserTypes;



class UserController extends Controller
{

    public function index()
    {

        $allUsers = User::get();
//       dd($allUsers->toArray());
        return view('admin.user.index',['data'=>$allUsers]);
    }


    public function create()
    {
        return view('admin.user.form');
    }



    public function store(UserRequest $request)
    {
      // dd($request->all());
        unset($request['password_confirmation']);
        $input                  = $request->all();
        $input['password']      = Hash::make($input['password']);


        try{
            User::create($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect()->route('user.index')->with('success', 'User successfully saved.');
        } else {
            return redirect('user')->with('error', 'Something error found !, Please try again.');
        }
    }


    public function edit($id)
    {

        $editModeData   = User::FindOrFail($id);;

        return view('admin.user.form')->with(['editModeData'=>$editModeData]);

    }


    public function update(UserRequest $request, $id)
    {

        $data                = User::FindOrFail($id);
        $input               = $request->all();



        try{
            $data->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect()->route('user.index')->with('success', 'User successfully updated.');
        } else {
            return redirect()->back()->with('error', 'Something error found !, Please try again.');
        }
    }


    public function destroy($id)
    {
        try{
            $user = User::FindOrFail($id);

            $user->delete();
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            echo "success";
        }elseif ($bug == 1451) {
            echo 'hasForeignKey';
        } else {
            echo 'error';
        }
    }

}
