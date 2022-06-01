<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('loginRegister.register',[
            "title" => "Register",
            "active" => "register"
        ]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|min:5|max:255'
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);
        // $request->session()->flash('success','Registration successfull! Please login');
        return redirect('/login')->with('success','Registration successfull! Please login');
    }
}
