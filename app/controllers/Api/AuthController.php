<?php

namespace Api;

class AuthController extends \BaseController {

    public function checkAuth()
    {
        $result = 401;
        $subscriptor = array(
            'email' => \Input::get('email'),
            'password' => \Input::get('password')
        );
        if (\Auth::validate($subscriptor)) {
            $result = "200";

            // SECTION HARDCODED FOR DEMO PURPOSES //
            if ($subscriptor['email'] == 'admin@mail.com')
                $result .= ":1";
            else if ($subscriptor['email'] == 'kiosk@mail.com')
                $result .= ":3";
            else 
                $result .= ":2";
            // END OF OFFENSIVE CODE //
            return $result;

        }
        return $result;
    }


}