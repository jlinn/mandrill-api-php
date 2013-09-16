<?php
/**
 * User: Joe Linn
 * Date: 9/12/13
 * Time: 4:46 PM
 */

namespace Mandrill;

use Guzzle\Http\Client;
use Guzzle\Http\Exception\ServerErrorResponseException;
use Mandrill\Exception\APIException;

abstract class Api{
    const BASE_URL = 'https://mandrillapp.com/api/1.0/';

    /**
     * @var string Mandrill API key
     */
    protected $apiKey;

    /**
     * @var string Used to store an alternative base url for the API. Typically used only for testing.
     */
    protected $baseUrl;

    /**
     * @param string $apiKey
     */
    public function __construct($apiKey){
        $this->apiKey = $apiKey;
    }

    /**
     * Set an alternative base url for the API.  Typically used for testing purposes.
     * @param string $url
     */
    public function setBaseUrl($url){
        $this->baseUrl = $url;
    }

    /**
     * Send a request to Mandrill. All requests are sent via HTTP POST.
     * @param string $url
     * @param array $body
     * @throws Exception\APIException
     * @return array
     */
    protected function request($url, array $body = array()){
        $baseUrl = self::BASE_URL;
        if(isset($this->baseUrl)){
            $baseUrl = $this->baseUrl;
        }
        $client = new Client($baseUrl);
        $body['key'] = $this->apiKey;
        $section = explode('\\', get_called_class());
        $section = strtolower(end($section));
        $request = $client->post($section.'/'.$url.'.json', NULL, $body);
        try{
            $response = $request->send();
            $response = $response->getBody();
        }
        catch(ServerErrorResponseException $e){
            $response = json_decode($e->getResponse()->getBody(), true);
            throw new APIException($response['message'], $response['code'], $response['status'], $response['name'], $e);
        }
        return json_decode($response, true);
    }
}