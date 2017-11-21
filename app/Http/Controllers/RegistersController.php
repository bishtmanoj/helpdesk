<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;

class RegistersController extends Controller
{
    
    public function signup(){


    	return $this->render('sessions.signup');
    }

    public function store(Request $request){

    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required|unique:site_users,user_email',
    		'username' => 'required|alpha_dash|unique:site_users,user_login',
    		'password' => 'required|confirmed',
    		'password_confirmation' => 'required'
    	]);

    	User::create([
    		'user_name' => $request->get('name'),
    		'user_email' => $request->get('email'),
    		'user_login' => $request->get('username'),
    		'password' => bcrypt($request->get('password'))
    	]);
 
    	$this->setFlash('success','Account created, login to continue');

    	return redirect()->route('sessions.login');
    	
    }
}
