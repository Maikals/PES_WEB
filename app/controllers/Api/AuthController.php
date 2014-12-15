<?php

namespace Api;

class AuthController extends \BaseController {

    public function checkAuth()
    {
        $subscriptor = array(
            'email' => \Input::get('email'),
            'password' => \Input::get('password')
        );
        if (\Auth::attempt($subscriptor)) {
            return 200;
        }
        return 401;
    }


}