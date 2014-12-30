<?php

namespace Api;

class ValsController extends \BaseController {

    public function index()
    {
        $email = \Input::get('email');
        if ($email != null) {
            $subscriptor = \Subscriptor::where('email', '=', $email)->first();

            return \Val::where('data', '=', date('m/d/Y'))
            			->where('idSubscriptor', '=', $subscriptor->id)
            			->where('cancelat', '=', false)
            			->get();

        } else {
            return $this->response->errorBadRequest();
        }
        
    }

    public function check()
    {
    	// uses param ticketId and returns information if valid and not used
    }

    public function tick()
    {
    	// uses param ticketId and marks ticket as used
    }

    public function verifyIsUsed()
    {
    	// uses param ticketId and returns if the ticket is softDeleted or cancelat
    }


}