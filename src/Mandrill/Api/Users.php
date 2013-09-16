<?php
/**
 * User: Joe Linn
 * Date: 9/12/13
 * Time: 5:05 PM
 */

namespace Mandrill\Api;


use Guzzle\Http\Client;
use Mandrill\Api;

/**
 * Class Users
 * @package Mandrill\Api
 * @link https://mandrillapp.com/api/docs/users.JSON.html
 */
class Users extends Api{
    /**
     * Return information about the current API user
     * @return array
     * @link https://mandrillapp.com/api/docs/users.JSON.html#method=info
     */
    public function info(){
        return $this->request('info');
    }

    /**
     * Validate an API key and respond to a ping (anal JSON parser version)
     * @return array
     * @link https://mandrillapp.com/api/docs/users.JSON.html#method=ping2
     */
    public function ping2(){
        return $this->request('ping2');
    }

    /**
     * Return the senders that have tried to use this account, both verified and unverified
     * @return array
     * @link https://mandrillapp.com/api/docs/users.JSON.html#method=senders
     */
    public function senders(){
        return $this->request('senders');
    }
}