<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function indexP1(){
        $users = User::paginate(20);
        return view('eloquent_part1', compact('users'));
    }

    public function searchP1(Request $request){
        if($request->id){
            $users = User::Where([ ['id', $request->id], ['firstname', 'like', '%'. $request->firstname . '%' ],
        ['class', 'like', '%'. $request->class . '%' ] ])->paginate(20);
        }else{
            $users = User::Where([ ['firstname', 'like', '%'. $request->firstname . '%' ],
            ['class', 'like', '%'. $request->class . '%' ] ])->paginate(20);
        }

        return view('eloquent_part1', compact('users'));
    }

    public function indexP2(){
        $users = User::with('userPhone','userRole')->paginate(20);
        return view('eloquent_part2', compact('users'));
    }

    public function searchP2(Request $request){
        if($request->id){
            $users = DB::table('users')
            ->join('phones', 'users.id', '=', 'phones.user_id')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.id', 'users.firstname', 'phones.number', 'roles.name')
            ->where([['phones.number', 'like', '%'. $request->number . '%'], ['roles.name', 'like', '%'. $request->role . '%'], ['users.id' , '=', $request->id] ])
            ->get();
        }else{
            $users = DB::table('users')
            ->join('phones', 'users.id', '=', 'phones.user_id')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.id', 'users.firstname', 'phones.number', 'roles.name')
            ->where([['phones.number', 'like', '%'. $request->number . '%'], ['roles.name', 'like', '%'. $request->role . '%']])
            ->get();
        }
        //dd($users);
        return view('eloquent_part2-2', compact('users'));
    }
}
