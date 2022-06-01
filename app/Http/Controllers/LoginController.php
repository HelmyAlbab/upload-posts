<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('loginRegister.login',[
            "title"=>"Login",
            "active"=>"login"
        ]);
    }
    public function auth(Request $request){
        $credentials = $request->validate([
            'username' => ['required','min:3','max:255'],
            'password' => ['required','min:5','max:255']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with([
            'error' => 'Login Failed!',
        ]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
