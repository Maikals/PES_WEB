<?php

class AuthController extends BaseController {

    public function doLogin()
    {
        $subscriptor = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        if (Auth::attempt($subscriptor)) {
            if ($subscriptor['email'] == "admin@mail.com") {
                Session::put('admin', 'admin');
            }
            return Redirect::to('/');
        }
        return Redirect::to('login')
            ->withInput()
            ->with('message', 'Les dades d\'inici de sessió són incorrectes.');
    }

    public function doLogout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('login');
    }

}