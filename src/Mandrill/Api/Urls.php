<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 3:56 PM
 */

namespace Mandrill\Api;


use Mandrill\Api;

/**
 * Class Urls
 * @package Mandrill\Api
 * @link https://mandrillapp.com/api/docs/urls.JSON.html
 */
class Urls extends Api{
    /**
     * Get the 100 most clicked URLs
     * @return array
     * @link https://mandrillapp.com/api/docs/urls.JSON.html#method=list
     */
    public function listUrls(){
        return $this->request('list');
    }

    /**
     * Return the 100 most clicked URLs that match the search query given
     * @param string $query a search query
     * @return array
     * @link https://mandrillapp.com/api/docs/urls.JSON.html#method=search
     */
    public function search($query){
        return $this->request('search', array(
            'q' => $query
        ));
    }

    /**
     * Return the recent history (hourly stats for the last 30 days) for a url
     * @param string $url an existing URL
     * @return array
     * @link https://mandrillapp.com/api/docs/urls.JSON.html#method=time-series
     */
    public function timeSeries($url){
        return $this->request('time-series', array(
            'url' => $url
        ));
    }
}