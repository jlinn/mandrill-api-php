<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 3:37 PM
 */

namespace Mandrill\Api;


use Mandrill\Api;

/**
 * Class Rejects
 * @package Mandrill\Api
 * @link https://mandrillapp.com/api/docs/rejects.JSON.html
 */
class Rejects extends Api{
    /**
     * Adds an email to your email rejection blacklist.
     * @param string $email an email address to block
     * @param string $comment an optional comment describing the rejection
     * @param string $subaccount an optional unique identifier for the subaccount to limit the blacklist entry
     * @return array
     * @link https://mandrillapp.com/api/docs/rejects.JSON.html#method=add
     */
    public function add($email, $comment = NULL, $subaccount = NULL){
        return $this->request('add', array(
            'email' => $email,
            'comment' => $comment,
            'subaccount' => $subaccount
        ));
    }

    /**
     * Retrieves your email rejection blacklist
     * @param string $email an optional email address to search by
     * @param bool $includeExpired whether to include rejections that have already expired.
     * @param string $subaccount an optional unique identifier for the subaccount to limit the blacklist
     * @return array
     * @link https://mandrillapp.com/api/docs/rejects.JSON.html#method=list
     */
    public function listRejects($email = NULL, $includeExpired = false, $subaccount = NULL){
        return $this->request('list', array(
            'email' => $email,
            'include_expired' => $includeExpired,
            'subaccount' => $subaccount
        ));
    }

    /**
     * Deletes an email rejection.
     * @param $email an email address
     * @param null $subaccount an optional unique identifier for the subaccount to limit the blacklist deletion
     * @return array
     * @link https://mandrillapp.com/api/docs/rejects.JSON.html#method=delete
     */
    public function delete($email, $subaccount = NULL){
        return $this->request('delete', array(
            'email' => $email,
            'subaccount' => $subaccount
        ));
    }
}