<?php

namespace Api;

class ValsController extends \BaseController {

    public function index()
    {
        $email = \Input::get('email');
        if ($email != null) {
            $subscriptor = \Subscriptor::where('email', '=', $email)->first();
            return \Val::where('data', '=', new \DateTime('today'))->where('idSubscriptor', '=', $subscriptor->id)->get();
            //return $subscriptor;
        } else {
            return $this->response->errorBadRequest();
        }
        
        //return \Val::where('DATE(data)', '=', 'DATE(NOW())')->where('idSubscriptor', '=', $subscriptor->id);
    }


}