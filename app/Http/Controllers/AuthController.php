<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class AuthController extends Controller
{
    public function signin(Request $req){
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return redirect()->back();
        }else{
            return redirect()->back()->with('messager_login', 'Wrong username or password');
        }
    }

    public function signup(UserRequest $request)
    {

        $user = User::create([
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'firstname'     => $request->firstname,
            'lastname'      => $request->lastname
        ]);

        return redirect()->back()->with('success_msg', 'Đăng kí thành công !');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
