<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('profile_img'))  {
            User::uploadAvatar($request->profile_img);
        }
        return redirect()->back();

    }
    public function index()
    {   
        // Save User data

        // $user = new User();
        // $user->name = 'John Doe';
        // $user->email = 'johndoe@gmail.com';
        // $user->password = bcrypt('mysecurepassword');
        // $user->save();

        // Show all users

        return User::all();

        // Delete user

        // User::where('id', 1)->delete();


        // Update user

        // user::where('id', 2)->update(['name'=>'Bango Cosam', 'email'=>'bangocosam@gmail.com', 'password'=>bcrypt('mysecurepassword')]);
        // User::where('id', 5)->update(['password'=> bcrypt('mysecurepassword')]);


        // Create user in optimal good way

        // $newUser = [
        //     'name'=> 'Foo',
        //     'email'=> 'foo@gmail.com',
        //     'password'=> bcrypt('mysecurepassword'),
        // ];
        // User::create($newUser);

        // $newUser = [
        //     'name'=> 'abraham macha',
        //     'email'=> 'macha@gmail.com',
        //     'password'=> 'mysecurepassword',
        // ];
        // User::create($newUser);

        return view('home');
    }
}
