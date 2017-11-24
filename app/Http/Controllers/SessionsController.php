<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cookie;
use Illuminate\Cookie\CookieJar;
use App\User;
use Mail;

class SessionsController extends Controller {

    public function login() {
        return $this->render('sessions.login');
    }

    public function store(Request $request) {

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

    public function locale($locale) {

        $this->setLocale($locale);

        return redirect("$locale/");
    }

    public function password_request() {

        return $this->render('sessions.password');
    }

    public function send_reset_link(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|exists:site_users,user_email'
        ]);

        $user = User::where('user_email', $request->get('email'))->first();
        $user->fill(['remember_token' => uniqid(time(), true)])->save();
        $this->data = [
            'user' => $user
        ];

        Mail::send('mail.password', $this->data, function($message) use ($user) {
            $message->to($user->user_email, $user->user_name)->subject
                    ('Password reset link for helpdesk account');
            $message->from('support@helpdesk.com', 'Support Helpdesk');
        });
        $this->setFlash('success', trans('user.password_request_sent'));
        return redirect()->route('sessions.login');
    }

    public function reset_password($token = false) {

        if (!User::where('remember_token', $token)->first()):
            $this->setFlash('info', trans('user.invalid_request_token'));
            return redirect()->route('sessions.login');
        endif;

        return $this->render('sessions.reset_password');
    }

    public function update_password(Request $request, $token = false) {

        if (!($user = User::where('remember_token', $token)->first())):
            $this->setFlash('info', trans('user.invalid_request_token'));
            return redirect()->route('sessions.login');
        endif;

        $this->validate($request, [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user->fill(['password' => bcrypt($request->get('password')), 'remember_token' => NULL])->save();
        $this->setFlash('info', trans('user.password_reset_success'));
        return redirect()->route('sessions.login');
    }

}
