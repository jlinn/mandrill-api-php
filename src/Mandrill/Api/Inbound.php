<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 4:52 PM
 */

namespace Mandrill\Api;


use Mandrill\Api;

/**
 * Class Inbound
 * @package Mandrill\Api
 * @link https://mandrillapp.com/api/docs/inbound.JSON.html
 */
class Inbound extends Api{
    /**
     * List the domains that have been configured for inbound delivery
     * @return array
     * @link https://mandrillapp.com/api/docs/inbound.JSON.html#method=domains
     */
    public function domains(){
        return $this->request('domains');
    }

    /**
     * List the mailbox routes defined for an inbound domain
     * @param string $domain the domain to check
     * @return array
     * @link https://mandrillapp.com/api/docs/inbound.JSON.html#method=routes
     */
    public function routes($domain){
        return $this->request('routes', array(
            'domain' => $domain
        ));
    }

    /**
     * Take a raw MIME document destined for a domain with inbound domains set up, and send it to the inbound hook exactly as if it had been sent over SMTP
     * @param string $rawMessage the full MIME document of an email message
     * @param string[] $to optionally define the recipients to receive the message - otherwise we'll use the To, Cc, and Bcc headers provided in the document
     * @param string $mailFrom the address specified in the MAIL FROM stage of the SMTP conversation. Required for the SPF check.
     * @param string $helo the identification provided by the client mta in the MTA state of the SMTP conversation. Required for the SPF check.
     * @param string $clientAddress the remote MTA's ip address. Optional; required for the SPF check.
     * @return array
     * @link https://mandrillapp.com/api/docs/inbound.JSON.html#method=send-raw
     */
    public function sendRaw($rawMessage, array $to = array(), $mailFrom = NULL, $helo = NULL, $clientAddress = NULL){
        return $this->request('send-raw', array(
            'raw_message' => $rawMessage,
            'to' => $to,
            'mail_from' => $mailFrom,
            'helo' => $helo,
            'client_address' => $clientAddress
        ));
    }
}