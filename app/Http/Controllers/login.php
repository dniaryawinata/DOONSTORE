<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect('/home');
        }else{
            return view('login');
        }
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'name' => ['required'],
            'password'=> ['required'],
        ]);
    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect('home');
        }

    return back()->withErrors([
        'name' => 'Invalid name'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        return redirect('/login');
    }

    public function register()
    {
        if(Auth::check()){
            return redirect('/home');
        }else{
            return view('login');
        }
    }

    public function authRegister(Request $request)
    {
        $credentials = $request->validate([
            'name'=> ['required'],
            'password'=> ['required'],
            'email'=> ['required'],
        ]);

        User::create([
        'name' => $request->name,
        'email'=> $request->email,
        'password' => Hash::make($request->password),
        ]);
    
        if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->intended('/home');
        }

        return back()->withErrors([
            'name' => 'the provided name is invalid'
        ]);
    }
}