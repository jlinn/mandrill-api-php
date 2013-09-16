<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 3:43 PM
 */

namespace Mandrill\Api;


use Mandrill\Api;

/**
 * Class Whitelists
 * @package Mandrill\Api
 * @link https://mandrillapp.com/api/docs/whitelists.JSON.html
 */
class Whitelists extends Api{
    /**
     * Adds an email to your email rejection whitelist. If the address is currently on your blacklist, that blacklist entry will be removed automatically.
     * @param string $email an email address to add to the whitelist
     * @return array
     * @link https://mandrillapp.com/api/docs/whitelists.JSON.html#method=add
     */
    public function add($email){
        return $this->request('add', array(
            'email' => $email
        ));
    }

    /**
     * Retrieves your email rejection whitelist.
     * @param string $email an optional email address or prefix to search by
     * @return array
     * @link https://mandrillapp.com/api/docs/whitelists.JSON.html#method=list
     */
    public function listWhitelists($email = NULL){
        return $this->request('list', array(
            'email' => $email
        ));
    }

    /**
     * Removes an email address from the whitelist.
     * @param string $email the email address to remove from the whitelist
     * @return array
     * @link https://mandrillapp.com/api/docs/whitelists.JSON.html#method=delete
     */
    public function delete($email){
        return $this->request('delete', array(
            'email' => $email
        ));
    }
}