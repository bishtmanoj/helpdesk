<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller {

    public function index() {
        $this->data['users'] = User::role()->paginate(5);
        return $this->render('users.list');
    }

    public function create($id = false) {
        $this->data['user'] = User::role()->where('user_id', $id)->first();

        return $this->render('users.create');
    }

    public function store(Request $request, $id = false) {

        $user = User::role()->where('user_id', $id)->first();

        $validate = [
            'name' => 'required',
            'username' => 'required|unique:site_users,user_login',
            'email' => 'required|email|unique:site_users,user_email',
            'postal_code' => 'integer',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        $formData = [
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
        ];

        if ($user && !$request->get('change_password')):
            unset($validate['password']);
            unset($validate['password_confirmation']);
            unset($formData['password']);
            $validate['email'] .= ",{$id},user_id";
            $validate['username'] .= ",{$id},user_id";
        endif;

        $this->validate($request, $validate);

        if ($user)
            $user->fill($formData)->save();
        else
            User::create($formData);

        $this->setFlash('success', trans($user ? 'update_success' : 'user.add_success'));

        return redirect()->route('users.list');
    }

    public function distroy(Request $request, $id = false) {
        if ($user = User::role()->where('user_id', $id)->first()):
            if ($calls = $user->calls->count()):
                $this->setFlash('info', trans('user.del_user_has_call'));
            else:
                $user->delete();
                $this->setFlash('success', trans('user.delete_success'));
            endif;
        else:
            $this->setFlash('info', trans('user.delete_error'));
        endif;
        return redirect()->route('users.list');
    }

}
