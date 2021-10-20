<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index() {
        return view('admin.login');
    }

    public function store(Request $request) {

        // Validate the user
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Log the user In
        $credentials = $request->only('email','password');
        $auth = Auth::guard('admin');
        if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard){
            if (! $auth->attempt($credentials)) {
                return back()->withErrors([
                    'message' => 'Wrong credentials. Please try again'
                ]);
            }
    
            // Session message
            session()->flash('msg','You have been logged in!');
    
            return redirect('/admin');
        }else{
            dd('This is an error on login');
        }

    }

    public function logout() {
        $auth = Auth::guard('admin');
        if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard){
            $auth->logout();

            session()->flash('msg','You have been logged out successfully!');

            return redirect('/admin/login');
        }else{
            dd('This is an error on logout');
        }
    }

}
