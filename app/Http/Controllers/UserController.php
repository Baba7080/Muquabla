<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;


class UserController extends Controller
{

    public function form() {
        return view('welcome');
    }

    public function show(): View
    {
        return view('welcome');
    }

    public function login(Request $request){
        $user = User::where('name', "Abhishek")->first();

        if (!$user) {
            // User not found
            $message = "User not found";
            return view('welcome')->with('message', $message);
        }

        // Verify the password
        if (password_verify($_GET['password'], $user->password)) {

            // Password matches, authenticate user
            // Implement your authentication logic here (e.g., setting session, redirecting)
            $request->session()->put('user', $user);
            return view('home'); // Redirect to dashboard
        } else {
            // Password does not match
            return view('welcome')->with('message', "Invalid password");
        }
    }
    public function color(){
        return view('color');
    }
    public function rashi(){
        return view('rashi');
    }
    public function numbergame(){
        return view('numbergame');
    }
}
