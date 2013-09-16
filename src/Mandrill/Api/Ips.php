<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 5:04 PM
 */

namespace Mandrill\Api;


use Mandrill\Api;

/**
 * Class Ips
 * @package Mandrill\Api
 * @link https://mandrillapp.com/api/docs/ips.JSON.html
 */
class Ips extends Api{
    /**
     * Lists your dedicated IPs.
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=list
     */
    public function listIps(){
        return $this->request('list');
    }

    /**
     * Retrieves information about a single dedicated ip.
     * @param string $ip a dedicated IP address
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=info
     */
    public function info($ip){
        return $this->request('info', array(
            'ip' => $ip
        ));
    }

    /**
     * Requests an additional dedicated IP for your account. Accounts may have one outstanding request at any time, and provisioning requests are processed within 24 hours.
     * @param bool $warmup whether to enable warmup mode for the ip
     * @param string $pool the id of the pool to add the dedicated ip to, or null to use your account's default pool
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=provision
     */
    public function provision($warmup = false, $pool = NULL){
        return $this->request('provision', array(
            'warmup' => $warmup,
            'pool' => $pool
        ));
    }

    /**
     * Begins the warmup process for a dedicated IP.
     * @param string $ip a dedicated ip address
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=start-warmup
     */
    public function startWarmup($ip){
        return $this->request('start-warmup', array(
            'ip' => $ip
        ));
    }

    /**
     * Cancels the warmup process for a dedicated IP.
     * @param string $ip a dedicated ip address
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=cancel-warmup
     */
    public function cancelWarmup($ip){
        return $this->request('cancel-warmup', array(
            'ip' => $ip
        ));
    }

    /**
     * Moves a dedicated IP to a different pool.
     * @param string $ip a dedicated ip address
     * @param string $pool the name of the new pool to add the dedicated ip to
     * @param bool $createPool whether to create the pool if it does not exist; if false and the pool does not exist, an Unknown_Pool will be thrown.
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=set-pool
     */
    public function setPool($ip, $pool, $createPool = false){
        return $this->request('set-pool', array(
            'ip' => $ip,
            'pool' => $pool,
            'create_pool' => $createPool
        ));
    }

    /**
     * Deletes a dedicated IP. This is permanent and cannot be undone.
     * @param string $ip a dedicated ip address
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=delete
     */
    public function delete($ip){
        return $this->request('delete', array(
            'ip' => $ip
        ));
    }

    /**
     * Lists your dedicated IP pools.
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=list-pools
     */
    public function listPools(){
        return $this->request('list-pools');
    }

    /**
     * Describes a single dedicated IP pool.
     * @param string $pool a pool name
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=pool-info
     */
    public function poolInfo($pool){
        return $this->request('pool-info', array(
            'pool' => $pool
        ));
    }

    /**
     * Creates a pool and returns it. If a pool already exists with this name, no action will be performed.
     * @param string $pool the name of a pool to create
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=create-pool
     */
    public function createPool($pool){
        return $this->request('create-pool', array(
            'pool' => $pool
        ));
    }

    /**
     * Deletes a pool. A pool must be empty before you can delete it, and you cannot delete your default pool.
     * @param string $pool the name of the pool to delete
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=delete-pool
     */
    public function deletePool($pool){
        return $this->request('delete-pool', array(
            'pool' => $pool
        ));
    }

    /**
     * https://mandrillapp.com/api/docs/ips.JSON.html#method=check-custom-dns
     * @param string $ip a dedicated ip address
     * @param string $domain the domain name to test
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=check-custom-dns
     */
    public function checkCustomDNS($ip, $domain){
        return $this->request('check-custom-dns', array(
            'ip' => $ip,
            'domain' => $domain
        ));
    }

    /**
     * Configures the custom DNS name for a dedicated IP.
     * @param string $ip a dedicated ip address
     * @param string $domain a domain name to set as the dedicated IP's custom dns name.
     * @return array
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=set-custom-dns
     */
    public function setCustomDNS($ip, $domain){
        return $this->request('set-custom-dns', array(
            'ip' => $ip,
            'domain' => $domain
        ));
    }
}