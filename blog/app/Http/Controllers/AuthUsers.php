<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;

class AuthUsers extends Controller
{
    public function dashboard(Request $request)
    {
        $users = users::where('id', session()->get('id'))->first();
        return view('users.dashboard')->with('users', $users);
    }

    public function profile()
    {
        $users = users::where('id', session()->get('id'))->first();
        return view('users.profile')->with('users', $users);
    }

    public function userEdit(Request $request)
    {
        $users = users::where('id', $request->id)->first();
        return view('users.userEdit')->with('users',$users);
        
    }

    public Function userEditSubmitted(Request $request){
        $users = users::where('id', $request->id)->first();
        $users->Name = $request->name;
        $users->Email = $request->email;
        $users->Password = $request->password;
        $users->save();
        return view('users.profile')->with('users',$users);
    }

    public function userDelete(Request $request)
    {
        $users = users::where('id', $request->id)->first();
        $users->delete();
        session()->forget('usersName');
        return redirect()->route('login');
        
    }
}
