<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 10:07 AM
 */

namespace Mandrill;


class Mandrill{
    /**
     * @var string Mandrill API key
     */
    protected $apiKey;

    /**
     * @var Api\Users
     */
    protected $users;

    /**
     * @var Api\Messages
     */
    protected $messages;

    /**
     * @var Api\Tags
     */
    protected $tags;

    /**
     * @var Api\Rejects
     */
    protected $rejects;

    /**
     * @var Api\Whitelists
     */
    protected $whitelists;

    /**
     * @var Api\Senders
     */
    protected $senders;

    /**
     * @var Api\Urls
     */
    protected $urls;

    /**
     * @var Api\Templates
     */
    protected $templates;

    /**
     * @var Api\Webhooks
     */
    protected $webhooks;

    /**
     * @var Api\Subaccounts
     */
    protected $subaccounts;

    /**
     * @var Api\Inbound
     */
    protected $inbound;

    /**
     * @var Api\Exports
     */
    protected $exports;

    /**
     * @var Api\Ips
     */
    protected $ips;

    /**
     * @param string $apiKey Mandrill API key
     */
    public function __construct($apiKey){
        $this->apiKey = $apiKey;
    }

    /**
     * @return Api\Users
     */
    public function users(){
        if(isset($this->users)){
            return $this->users;
        }
        $this->users = new Api\Users($this->apiKey);
        return $this->users;
    }

    /**
     * @return Api\Messages
     */
    public function messages(){
        if(isset($this->messages)){
            return $this->messages;
        }
        $this->messages = new Api\Messages($this->apiKey);
        return $this->messages;
    }

    /**
     * @return Api\Tags
     */
    public function tags(){
        if(isset($this->tags)){
            return $this->tags;
        }
        $this->tags = new Api\Tags($this->apiKey);
        return $this->tags;
    }

    /**
     * @return Api\Rejects
     */
    public function rejects(){
        if(isset($this->rejects)){
            return $this->rejects;
        }
        $this->rejects = new Api\Rejects($this->apiKey);
        return $this->rejects;
    }

    /**
     * @return Api\Whitelists
     */
    public function whitelists(){
        if(isset($this->whitelists)){
            return $this->whitelists;
        }
        $this->whitelists = new Api\Whitelists($this->apiKey);
        return $this->whitelists;
    }

    /**
     * @return Api\Senders
     */
    public function senders(){
        if(isset($this->senders)){
            return $this->senders;
        }
        $this->senders = new Api\Senders($this->apiKey);
        return $this->senders;
    }

    /**
     * @return Api\Urls
     */
    public function urls(){
        if(isset($this->urls)){
            return $this->urls;
        }
        $this->urls = new Api\Urls($this->apiKey);
        return $this->urls;
    }

    /**
     * @return Api\Templates
     */
    public function templates(){
        if(isset($this->templates)){
            return $this->templates;
        }
        $this->templates = new Api\Templates($this->apiKey);
        return $this->templates;
    }

    /**
     * @return Api\Webhooks
     */
    public function webhooks(){
        if(isset($this->webhooks)){
            return $this->webhooks;
        }
        $this->webhooks = new Api\Webhooks($this->apiKey);
        return $this->webhooks;
    }

    /**
     * @return Api\Subaccounts
     */
    public function subaccounts(){
        if(isset($this->subaccounts)){
            return $this->subaccounts;
        }
        $this->subaccounts = new Api\Subaccounts($this->apiKey);
        return $this->subaccounts;
    }

    /**
     * @return Api\Inbound
     */
    public function inbound(){
        if(isset($this->inbound)){
            return $this->inbound;
        }
        $this->inbound = new Api\Inbound($this->apiKey);
        return $this->inbound;
    }

    /**
     * @return Api\Exports
     */
    public function exports(){
        if(isset($this->exports)){
            return $this->exports;
        }
        $this->exports = new Api\Exports($this->apiKey);
        return $this->exports;
    }

    /**
     * @return Api\Ips
     */
    public function ips(){
        if(isset($this->ips)){
            return $this->ips;
        }
        $this->ips = new Api\Ips($this->apiKey);
        return $this->ips;
    }
}