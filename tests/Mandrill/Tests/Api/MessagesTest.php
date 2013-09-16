<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 12:07 PM
 */

namespace Mandrill\Tests\Api;


use Mandrill\Api\Messages;
use Mandrill\Struct\Message;
use Mandrill\Struct\Recipient;
use Mandrill\Tests\MandrillTestCase;

class MessagesTest extends MandrillTestCase{
    /**
     * @var Messages
     */
    protected $messages;

    protected function setUp(){
        parent::setUp();
        $this->messages = $this->client->messages();
        $this->messages->setBaseUrl($this->getServer()->getUrl());
    }

    public function testSend(){
        $this->getServer()->enqueue($this->getMockResponse('send')->getMessage());

        $recipient = new Recipient();
        $recipient->email = 'recipient.email@example.com';
        $recipient->name = 'Recipient Name';
        $recipient->addMergeVar('NAME', $recipient->name);
        $message = new Message();
        $message->addRecipient($recipient);
        $message->text = 'Hello, *|NAME|*!';
        $message->subject = 'Test';
        $message->from_email = 'test@example.com';
        $message->from_name = 'Mandrill API Test';
        $response = $this->messages->send($message);

        $this->assertGreaterThan(0, sizeof($response));
        $this->assertEquals('sent', $response[0]['status']);
    }
}
