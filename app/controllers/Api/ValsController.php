<?php

namespace Api;

class ValsController extends \BaseController {

    public function index()
    {
        $email = \Input::get('email');
        if ($email != null) {
            $subscriptor = \Subscriptor::where('email', '=', $email)->first();

            return \Val::where('data', '=', date('m/d/Y'))->where('idSubscriptor', '=', $subscriptor->id)->get();

        } else {
            return $this->response->errorBadRequest();
        }
        
    }


}