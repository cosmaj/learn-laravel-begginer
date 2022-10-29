<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('profile_img'))  {
            User::uploadAvatar($request->profile_img);
        }
        return redirect()->back()->with('error_message', 'Please select an image');

    }
    public function index()
    {
        return view('home');
    }
}
