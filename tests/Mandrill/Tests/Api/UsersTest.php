<?php
/**
 * User: Joe Linn
 * Date: 9/12/13
 * Time: 5:20 PM
 */

namespace Mandrill\Tests\Api;

use Mandrill\Tests\MandrillTestCase;

class UsersTest extends MandrillTestCase {
    /**
     * @var \Mandrill\Api\Users
     */
    protected $users;

    protected function setUp(){
        parent::setUp();
        $this->users = $this->client->users();
        $this->users->setBaseUrl($this->getServer()->getUrl());
    }

    public function testInfo(){
        $this->getServer()->enqueue((string) $this->getMockResponse('info'));

        $response = $this->users->info();
        $this->assertArrayHasKey('stats', $response);
    }

    public function testPing2(){
        $this->getServer()->enqueue((string) $this->getMockResponse('ping2'));

        $response = $this->users->ping2();
        $this->assertArrayHasKey('PING', $response);
        $this->assertEquals($response['PING'], 'PONG!');
    }

    public function testSenders(){
        $this->getServer()->enqueue((string) $this->getMockResponse('senders'));

        $response = $this->users->senders();
        $this->assertGreaterThan(0, sizeof($response));
    }
}
