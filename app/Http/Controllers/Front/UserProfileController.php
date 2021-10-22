<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index() {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();

        return view('front.profile.index', compact('user'));
    }

    public function show($id) {
        $order = Order::find($id);
        return view('front.profile.details', compact('order'));
    }
}
