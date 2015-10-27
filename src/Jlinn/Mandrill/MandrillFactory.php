<?php

namespace Jlinn\Mandrill;

use Jlinn\Mandrill\Mandrill;

use Jlinn\Mandrill\Struct\Message;
use Jlinn\Mandrill\Struct\Recipient;
use Jlinn\Mandrill\Struct\Attachment;

class MandrillFactory
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function api()
    {
        return new Mandrill($this->apiKey);
    }

    public function message(Array $args = [])
    {
        if (empty($args)) {
            return new Message;
        }

        $message = new Message;
        foreach ($args as $key => $value) {
            $message->$key = $value;
        }

        return $message;
    }

    public function attachment(Array $args = [])
    {
        if (empty($args)) {
            return new Attachment;
        }

        $attachment = new Attachment;
        foreach ($args as $key => $value) {
            $attachment->$key = $value;
        }

        return $attachment;
    }

    public function recipient($email = NULL, $name = NULL, $type = NULL)
    {
        return new Recipient($email, $name, $type);
    }
}