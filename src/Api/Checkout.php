<?php

namespace SlashLibrary\Api;
use SlashLibrary\Request\RequestGateway;

class Checkout{

	const PAY_ENDPOINT = 'pay';

	const CHARGE_ENDPOINT = 'createcharge';

	protected $request = null;

	protected $privateKey = null;


    public function __construct($request, $privateKey)
    {
        $this->request = $request;
        $this->privateKey = $privateKey;
    }

    public function pay($data){
    	echo('Bearer ' . $this->privateKey);
    	return $this->request->post(self::PAY_ENDPOINT, $data, [
    		'Authorization' => 'Bearer ' . $this->privateKey
    	]);
    }

    public function charge($data){
    	return $this->request->post(self::CHARGE_ENDPOINT, $data, [
    		'Authorization' => 'Bearer ' . $this->privateKey
    	]);
    }

}