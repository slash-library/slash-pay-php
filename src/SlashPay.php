<?php

namespace SlashLibrary;
use SlashLibrary\Request\RequestGateway;
use SlashLibrary\Api\Checkout;
use SlashLibrary\Api\Redirect;
use SlashLibrary\Api\Subscription;

class SlashPay{

	protected $apiUrl = 'http://localhost:1337/';
	// protected $apiUrl = 'https://api.slash.us.com/';

	protected $apiVersion = 'v1';

	protected $publicKey;	

	protected $privateKey;	

	protected $request = null;


    public function __construct($publicKey, $privateKey)
    {
        $this->publicKey = $publicKey;

        $this->privateKey = $privateKey;

        $this->request = new RequestGateway($this->apiUrl . $this->apiVersion . '/');

        $this->checkout = new Checkout($this->request, $this->privateKey);

        $this->redirect = new Redirect($this->request, $this->privateKey);

        $this->subscription = new Subscription($this->request, $this->privateKey);
    }

    /*
     *	Pay: 
     *  API Method
	 *
    */
    public function pay($data){
    	return $this->checkout->pay($data);
    }

    /*
     *	Charge: 
     *  API Method
	 *
    */
    public function charge($data){
    	return $this->checkout->charge($data);
    }

    /*
     *	Subscribe: 
     *  API Method
	 *
    */
    public function subscribe($data){
    	return $this->subscription->subscribe($data);
    }

    /*
     *	Unsubscribe: 
     *  API Method
	 *
    */
    public function unsubscribe($data){
    	return $this->subscription->unsubscribe($data);
    }

    /*
     *	Redirect: 
     *  API Method
	 *
    */
    public function redirect($data){
    	return $this->redirect->redirect($data);
    }

    /*
     *	Confirm: 
     *  API Method
	 *
    */
    public function confirm($data){
    	return $this->redirect->confirm($data);
    }

}