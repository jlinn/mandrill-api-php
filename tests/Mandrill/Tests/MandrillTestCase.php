<?php
/**
 * User: Joe Linn
 * Date: 9/12/13
 * Time: 5:12 PM
 */

namespace Mandrill\Tests;

use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Tests\GuzzleTestCase;
use Mandrill\Mandrill;

class MandrillTestCase extends GuzzleTestCase{
    /**
     * @var \Mandrill\Mandrill
     */
    protected $client;

    protected function setUp(){
        parent::setUp();
        $this->client = new Mandrill('api_key');
    }

    protected function getMockResponsePath(){
        $directory = explode('\\', get_called_class());
        $directory = end($directory);
        $directory = str_replace('Test', '', $directory);
        return __DIR__.'/../../mock/'.$directory.'/';
    }

    public function getMockResponse($path){
        return parent::getMockResponse($this->getMockResponsePath().$path.'.txt');
    }
}