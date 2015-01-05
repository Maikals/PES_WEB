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
    	$ticketId = \Input::get('ticketId');
    	$val = \Val::find($ticketId);
    	if ($val->cancelat)
    		return "cancelled";
    	if ($val->data != date('m/d/Y'))
    		return "invalid";
    	return $val;
    }

    public function tick()
    {
    	// uses param ticketId and marks ticket as used
    	$ticketId = \Input::get('ticketId');
    	$val = \Val::find($ticketId);
    	if ($val->cancelat)
    		return "cancelled";
    	if ($val->data != date('m/d/Y'))
    		return "invalid";
    	$val->cancelat = true;
    	$val->save();
    	return '200';
    }

    public function verifyIfUsed()
    {
    	// uses param ticketId and returns if the ticket is softDeleted or cancelat
    	$ticketId = \Input::get('ticketId');
    	$val = \Val::find($ticketId);
    	if ($val->cancelat || $val->trashed())
    		return 'true';
    	else 
    		return 'false';
    }


}