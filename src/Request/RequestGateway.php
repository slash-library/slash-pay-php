<?php 

namespace SlashLibrary\Request;

class RequestGateway{

	protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getServerAddress()
    {
       	return $this->url;
    }

    private function sanitizeUri($uri){
        return str_replace('$', '/', $uri);
    }

    private function response($res, $resp){
        $encodedResp = $resp;

        try{
            $encodedResp = json_decode($encodedResp, true);
        }
        catch(\Exception $e){
        }

        $result = array(
            'headers' => curl_getinfo( $res ),
            'responseText' => $encodedResp
        );

        curl_close( $res );
        
        return $encodedResp;
    }

    private function translateHeaders($header){

        if (!isset($header['Content-Type'])){
            $header['Content-Type'] = 'application/json';
        }

        $result = array();
        foreach($header as $key => $value){
            $result[] = $key . ': ' . $value;
        }
        return $result;
    }

    /**
     * Do Get Request to Gateway
     */
    public function get($uri, $headers = array()){

        $uri = $this->getServerAddress() . $this->sanitizeUri($uri);

        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $uri,
            CURLOPT_USERAGENT => 'Slash',
            CURLOPT_HTTPHEADER => $this->translateHeaders($headers),
            CURLOPT_SSL_VERIFYPEER => false
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        return $this->response($curl, $resp);
    }

    /**
     * Do Post Request
     */
    public function post($uri, $data, $headers = array()){
        $uri = $this->getServerAddress() . $this->sanitizeUri($uri);
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $uri,
            CURLOPT_USERAGENT => 'Slash',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $this->translateHeaders($headers),
            CURLINFO_HEADER_OUT => true,
            CURLOPT_SSL_VERIFYPEER => false
        ));

        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        return $this->response($curl, $resp);
    }
}