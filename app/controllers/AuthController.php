<?php

class AuthController extends BaseController {

    public function doLogin()
    {
        $subscriptor = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        if (Auth::attempt($subscriptor)) {
            return Redirect::to('/');
        }
        return Redirect::to('login')
            ->withInput()
            ->with('message', 'Your email/password combination was incorrect.');
    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('login');
    }

}