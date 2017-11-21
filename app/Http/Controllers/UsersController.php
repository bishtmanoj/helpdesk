<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller {

    public function index() {
        $this->data['users'] = User::paginate(5);
        return $this->render('users.list');
    }

    public function create() {
        $this->data['user'] = false;
        return $this->render('users.create');
    }

    public function store(Request $request, $id = false) {


        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:site_users,user_login',
            'email' => 'required|email|unique:site_users,user_email',
            'postal_code' => 'integer',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create([
            "user_name" => $request->get('name'),
            "user_login" => $request->get('username'),
            "user_phone" => $request->get('phone'),
            "user_email" => $request->get('email'),
            "user_address" => $request->get('address'),
            "user_zip" => $request->get('postal_code'),
            "user_city" => $request->get('city'),
            "user_state" => $request->get('state'),
            "user_country" => $request->get('country'),
            "password" => bcrypt($request->get('password'))
        ]);

        $this->setFlash('success', trans('user.add_success'));
        
        return redirect()->route('users.list');
    }

}
