<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cookie;
use Illuminate\Cookie\CookieJar;

class SessionsController extends Controller
{
    
    public function login(){
 
    	return $this->render('sessions.login');
    }

    public function store(Request $request){

    	$this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['user_login' => $request->get('username'), 'password' => $request->get('password')], $request->get('remember')))
            return redirect()->route('user.profile');
        elseif (Auth::attempt(['user_email' => $request->get('username'), 'password' => $request->get('password')], $request->get('remember')))
            return redirect()->route('user.profile');
        else
            $this->setFlash('danger', trans('auth.failed'));
        return redirect()->route('sessions.login');

    }
    public function distroy() {
        Auth::logout();
        $this->setFlash('success', 'you have logged out successfully');
        return redirect()->route('login');
    }
    	

    public function locale($locale){ 

    	 $this->setLocale($locale); 
    	
    	return redirect("$locale/");  
    }
}
