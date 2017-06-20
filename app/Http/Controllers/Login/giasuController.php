<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class giasuController extends Controller
{

    public function postLogin(Request $request)
    {
    	$user=
    	[
    		'email'=>$request->email,
    		'password'=>$request->password,
    		'level'=>0,
            'status'=>1
    	];

    	if(Auth::attempt($user)){
    		return redirect()->route('quantri');
    	}else{
    		return redirect('/giasu_login')->withErrors("Email or password not accept !");
    	}

    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
