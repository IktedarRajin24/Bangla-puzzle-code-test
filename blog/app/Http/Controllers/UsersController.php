<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Session;
use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function login()
    {
        return view('login');
    }

    public function loginSubmitted(Request $request)
    {
        $validate = $request->validate([
            'email'=>'required|max:50',
            'password'=> 'required'
        ],
        [
            'email.max'=>'E-mail can not be greater than 50 charcters',
            'password.required'=> 'Please put a password'
        ]);
        $users = users::where('email',$request->email)
                            ->where('password',$request->password)
                            ->first();
        if($users){
            $request->session()->put('usersName',$users->Name);
            $request->session()->put('id',$users->id);
            return redirect()-> route('users.dashboard')->with('users', $users);
        }
        return back();
    }

    public function register()
    {
        return view('register');
    }

    public function registerSubmitted(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required|min:10|max:50',
            'email'=>'email',
            'password'=> 'required'
        ],
        [
            'name.required'=>'Please put your name',
            'name.min'=>'Name must be greater than 10 charcters',
            'name.max'=>'Name cannot be greater than 50 charcters',
            'email.max'=>'E-mail can not be greater than 50 charcters',
            'password.required'=> 'Please put a password'
        ]);
        $users = new users();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

}
