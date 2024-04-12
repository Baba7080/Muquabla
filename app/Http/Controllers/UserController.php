<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
class UserController extends Controller
{
    //
    public function show(): View
    {
        // return view('user.profile', [
        //     'user' => User::findOrFail($id)
        // ]);
        return view('home');
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
