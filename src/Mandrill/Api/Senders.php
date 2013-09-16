<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 3:49 PM
 */

namespace Mandrill\Api;


use Mandrill\Api;

/**
 * Class Senders
 * @package Mandrill\Api
 * @link https://mandrillapp.com/api/docs/senders.JSON.html
 */
class Senders extends Api{
    /**
     * Return the senders that have tried to use this account.
     * @return array
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=list
     */
    public function listSenders(){
        return $this->request('list');
    }

    /**
     * Returns the sender domains that have been added to this account.
     * @return array
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=domains
     */
    public function domains(){
        return $this->request('domains');
    }

    /**
     * Adds a sender domain to your account. Sender domains are added automatically as you send, but you can use this call to add them ahead of time.
     * @param string $domain domain name
     * @return array
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=add-domain
     */
    public function addDomain($domain){
        return $this->request('add-domain', array(
            'domain' => $domain
        ));
    }

    /**
     * Checks the SPF and DKIM settings for a domain. If you haven't already added this domain to your account, it will be added automatically.
     * @param string $domain domain name
     * @return array
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=check-domain
     */
    public function checkDomain($domain){
        return $this->request('check-domain', array(
            'domain' => $domain
        ));
    }

    /**
     * Sends a verification email in order to verify ownership of a domain.
     * @param string $domain a domain name at which you can receive email
     * @param string $mailbox a mailbox at the domain where the verification email should be sent
     * @return array
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=verify-domain
     */
    public function verifyDomain($domain, $mailbox){
        return $this->request('verify-domain', array(
            'domain' => $domain,
            'mailbox' => $mailbox
        ));
    }

    /**
     * Return more detailed information about a single sender, including aggregates of recent stats
     * @param string $address the email address of the sender
     * @return array
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=info
     */
    public function info($address){
        return $this->request('info', array(
            'address' => $address
        ));
    }

    /**
     * Return the recent history (hourly stats for the last 30 days) for a sender
     * @param string $address the email address of the sender
     * @return array
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=time-series
     */
    public function timeSeries($address){
        return $this->request('time-series', array(
            'address' => $address
        ));
    }
}