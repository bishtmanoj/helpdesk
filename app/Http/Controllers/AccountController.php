<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class AccountController extends Controller {

    public function profile() {
        $this->data['user'] = Auth::user();
        return $this->render('account.profile');
    }

    public function store(Request $request) {

        switch ($request->get('tab')):
            case 'change-password':
                $rules = [
                    'current_password' => 'required',
                    'password' => 'required|confirmed',
                    'password_confirmation' => 'required',
                ];

                $formData = ["password" => bcrypt($request->get('password'))];
                break;
            case 'edit-profile':
                $rules = [
                    'name' => 'required',
                    'username' => 'required|unique:site_users,user_login,' . Auth::id() . ',user_id',
                    'email' => 'required|email|unique:site_users,user_email,' . Auth::id() . ',user_id',
                    'postal_code' => 'integer'
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
                ];
                break;
            default:
                return redirect()->back();
                break;
        endswitch;


        $validator = Validator::make($request->all(), $rules);

        if (!$validator->errors()->count()):
            if ($request->get('password') && !Auth::user()->hasPassword($request->get('current_password'))):
                $this->setFlash('danger', trans('form.invalid_current_password'));
                return redirect()->back();
            endif;
            Auth::user()->fill($formData)->save();
            $this->setFlash('success', trans('form.update_success'));
            return redirect()->route('user.profile');
        endif;

        return redirect()
                        ->route('user.profile', [
                            'tab' => $request->get('tab')
                        ])
                        ->withErrors($validator)
                        ->withInput();
    }

}
