<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user())
        {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            session()->flash('success','login successfully!');
            return redirect()->route('admin.dashboard');
        }
        session()->flash('delete','Email Or Password invalid');
        return redirect()->back()->withInput($request->all());

    }

    public function logout()
    {
        Auth::logout();
        session()->flash('success','logout successfully!');
        return redirect()->route('user.login');
    }
}
