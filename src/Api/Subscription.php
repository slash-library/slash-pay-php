<?php

namespace SlashLibrary\Api;
use SlashLibrary\Request\RequestGateway;

class Subscription{

	const SUBSCRIBE_ENDPOINT = 'subscribe';

	const UNSUBSCRIBE_ENDPOINT = 'unsubscribe';

	protected $request = null;

	protected $privateKey = null;


    public function __construct($request, $privateKey)
    {
        $this->request = $request;
        $this->privateKey = $privateKey;
    }

    public function subscribe($data){
    	return $this->request->post(self::SUBSCRIBE_ENDPOINT, $data, [
    		'Authorization' => 'Bearer ' . $this->privateKey
    	]);
    }

    public function unsubscribe($data){
    	return $this->request->post(self::UNSUBSCRIBE_ENDPOINT, $data, [
    		'Authorization' => 'Bearer ' . $this->privateKey
    	]);
    }

}