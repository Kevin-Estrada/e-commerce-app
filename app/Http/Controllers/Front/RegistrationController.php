<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    public function index() {
        return view('front.registration.index');
    }

    public function store(Request $request) {

        // Validate the user
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'address' => 'required'
        ]);

        // Save the data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,

        ]);

        // Sign the user in
        Auth::login($user);

        // Redirect to
        return redirect('/user/profile');

    }

}
