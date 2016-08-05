<?php

namespace SlashLibrary\Api;
use SlashLibrary\Request\RequestGateway;

class Redirect{

	const REDIRECT_ENDPOINT = 'redirect';

	const CONFIRM_ENDPOINT = 'confirm';

	protected $request = null;

	protected $privateKey = null;


    public function __construct($request, $privateKey)
    {
        $this->request = $request;
        $this->privateKey = $privateKey;
    }

    public function redirect($data){
    	return $this->request->post(self::REDIRECT_ENDPOINT, $data, [
    		'Authorization' => 'Bearer ' . $this->privateKey
    	]);
    }

    public function confirm($data){
    	return $this->request->post(self::CONFIRM_ENDPOINT, $data, [
    		'Authorization' => 'Bearer ' . $this->privateKey
    	]);
    }

}