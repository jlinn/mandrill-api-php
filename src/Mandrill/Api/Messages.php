<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 11:55 AM
 */

namespace Mandrill\Api;

use Guzzle\Http\Client;
use Mandrill\Api;
use Mandrill\Struct\Message;

/**
 * Class Messages
 * @package Mandrill\Api
 * @link https://mandrillapp.com/api/docs/messages.JSON.html
 */
class Messages extends Api{
    /**
     * Send a message
     * @param Message $message
     * @param bool $async set to true to enable asynchronous sending
     * @param string $ipPool optional name of the ip pool which should be used to send the message
     * @param string $sendAt optional UTC timestamp (YYY-MM-DD HH:MM:SS) at which the message should be sent
     * @return array
     * @link https://mandrillapp.com/api/docs/messages.JSON.html#method=send
     */
    public function send(Message $message, $async = false, $ipPool = NULL, $sendAt = NULL){
        return $this->request('send', array(
            'message' => $message->toArray(),
            'async' => $async,
            'ip_pool' => $ipPool,
            'send_at' => $sendAt
        ));
    }

    /**
     * Send a new transactional message through Mandrill using a template
     * @param string $templateName the immutable name or slug of a template that exists in the user's account
     * @param Message $message
     * @param array $templateContent array(array('name' => 'example_name', 'content' => 'example_content'))
     * @param bool $async set to true to enable asynchronous sending
     * @param string $ipPool optional name of the ip pool which should be used to send the message
     * @param string $sendAt optional UTC timestamp (YYY-MM-DD HH:MM:SS) at which the message should be sent
     * @return array
     * @link https://mandrillapp.com/api/docs/messages.JSON.html#method=send-template
     */
    public function sendTemplate($templateName, Message $message, array $templateContent = array(), $async = false, $ipPool = NULL, $sendAt = NULL){
        if(!sizeof($templateContent)){
            $templateContent = array('');   // Mandrill will not accept an empty array for template_content, but it does not require any actual content.
        }
        return $this->request('send-template', array(
            'template_name' => $templateName,
            'template_content'=> $templateContent,
            'message' => $message->toArray(),
            'async' => $async,
            'ip_pool' => $ipPool,
            'send_at' => $sendAt
        ));
    }

    /**
     * Search the content of recently sent messages and optionally narrow by date range, tags and senders
     * @param string $query the search terms to find matching messages for
     * @param string $dateFrom start date YYYY-MM-DD
     * @param string $dateTo end date
     * @param array $tags an array of tag names to narrow the search to, will return messages that contain ANY of the tags
     * @param array $senders an array of sender addresses to narrow the search to, will return messages sent by ANY of the senders
     * @param array $apiKeys an array of API keys to narrow the search to, will return messages sent by ANY of the keys
     * @param int $limit the maximum number of results to return, defaults to 100, 1000 is the maximum
     * @return array
     * @link https://mandrillapp.com/api/docs/messages.JSON.html#method=search
     */
    public function search($query = '*', $dateFrom = NULL, $dateTo = NULL, array $tags = array(), array $senders = array(), array $apiKeys = array(), $limit = 100){
        return $this->request('search', array(
            'query' => $query,
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
            'tags' => $tags,
            'senders' => $senders,
            'api_keys' => $apiKeys,
            'limit' => $limit
        ));
    }

    /**
     * Search the content of recently sent messages and return the aggregated hourly stats for matching messages
     * @param string $query the search terms to find matching messages for
     * @param string $dateFrom start date YYYY-MM-DD
     * @param string $dateTo end date YYYY-MM-DD
     * @param array $tags an array of tag names to narrow the search to, will return messages that contain ANY of the tags
     * @param array $senders an array of sender addresses to narrow the search to, will return messages sent by ANY of the senders
     * @return array
     * @link https://mandrillapp.com/api/docs/messages.JSON.html#method=search-time-series
     */
    public function searchTimeSeries($query = '*', $dateFrom = NULL, $dateTo = NULL, array $tags = array(), array $senders = array()){
        return $this->request('search-time-series', array(
            'query' => $query,
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
            'tags' => $tags,
            'senders' => $senders
        ));
    }

    /**
     * Get the information for a single recently sent message
     * @param string $id the unique id of the message to get - passed as the "_id" field in webhooks, send calls, or search calls
     * @return array
     * @link https://mandrillapp.com/api/docs/messages.JSON.html#method=info
     */
    public function info($id){
        return $this->request('info', array(
            'id' => $id
        ));
    }

    /**
     * Parse the full MIME document for an email message, returning the content of the message broken into its constituent pieces
     * @param string $rawMessage the full MIME document of an email message
     * @return array
     * @link https://mandrillapp.com/api/docs/messages.JSON.html#method=parse
     */
    public function parse($rawMessage){
        return $this->request('parse', array(
            'raw_message' => $rawMessage
        ));
    }

    /**
     * Take a raw MIME document for a message, and send it exactly as if it were sent through Mandrill's SMTP servers
     * @param string $rawMessage the full MIME document of an email message
     * @param string $fromEmail optionally define the sender address - otherwise we'll use the address found in the provided headers
     * @param string $fromName optionally define the sender alias
     * @param array $to optionally define the recipients to receive the message - otherwise we'll use the To, Cc, and Bcc headers provided in the document
     * @param bool $async set to true to enable asynchronous sending
     * @param string $ipPool optional name of the ip pool which should be used to send the message
     * @param string $sendAt optional UTC timestamp (YYY-MM-DD HH:MM:SS) at which the message should be sent
     * @return array
     * @link https://mandrillapp.com/api/docs/messages.JSON.html#method=send-raw
     */
    public function sendRaw($rawMessage, $fromEmail = NULL, $fromName = NULL, array $to = array(), $async = false, $ipPool = NULL, $sendAt = NULL){
        return $this->request('send-raw', array(
            'raw_message' => $rawMessage,
            'from_email' => $fromEmail,
            'from_name' => $fromName,
            'to' => $to,
            'async' => $async,
            'ip_pool' => $ipPool,
            'send_at' => $sendAt
        ));
    }

    /**
     * Queries your scheduled emails by sender or recipient, or both.
     * @param string $to an optional recipient address to restrict results to
     * @return array
     * @link https://mandrillapp.com/api/docs/messages.JSON.html#method=list-scheduled
     */
    public function listScheduled($to = NULL){
        return $this->request('list-scheduled', array(
            'to' => $to
        ));
    }

    /**
     * Cancels a scheduled email.
     * @param string $id a scheduled email id, as returned by any of the messages/send calls or messages/list-scheduled
     * @return array
     * @link https://mandrillapp.com/api/docs/messages.JSON.html#method=cancel-scheduled
     */
    public function cancelScheduled($id){
        return $this->request('cancel-scheduled', array(
            'id' => $id
        ));
    }

    /**
     * Reschedules a scheduled email.
     * @param string $id a scheduled email id, as returned by any of the messages/send calls or messages/list-scheduled
     * @param string $sendAt the new UTC timestamp when the message should sent (YYYY-MM-DD HH:MM:SS)
     * @return array
     * @link https://mandrillapp.com/api/docs/messages.JSON.html#method=reschedule
     */
    public function reschedule($id, $sendAt){
        return $this->request('reschedule', array(
            'id' => $id,
            'send_at' => $sendAt
        ));
    }
}