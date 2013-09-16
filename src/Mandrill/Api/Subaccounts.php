<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 4:41 PM
 */

namespace Mandrill\Api;


use Mandrill\Api;

/**
 * Class Subaccounts
 * @package Mandrill\Api
 * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html
 */
class Subaccounts extends Api{
    /**
     * Get the list of subaccounts defined for the account, optionally filtered by a prefix
     * @param string $query an optional prefix to filter the subaccounts' ids and names
     * @return array
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=list
     */
    public function listSubaccounts($query = NULL){
        return $this->request('list', array(
            'q' => $query
        ));
    }

    /**
     * Add a new subaccount
     * @param string $id a unique identifier for the subaccount to be used in sending calls
     * @param string $name an optional display name to further identify the subaccount
     * @param string $notes optional extra text to associate with the subaccount
     * @param int $customQuota an optional manual hourly quota for the subaccount. If not specified, Mandrill will manage this based on reputation.
     * @return array
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=add
     */
    public function add($id, $name = NULL, $notes = NULL, $customQuota = NULL){
        return $this->request('add', array(
            'id' => $id,
            'name' => $name,
            'notes' => $notes,
            'custom_quota' => $customQuota
        ));
    }

    /**
     * Given the ID of an existing subaccount, return the data about it
     * @param string $id the unique identifier of the subaccount to query
     * @return array
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=info
     */
    public function info($id){
        return $this->request('info', array(
            'id' => $id
        ));
    }

    /**
     * Update an existing subaccount
     * @param string $id he unique identifier of the subaccount to update
     * @param string $name an optional display name to further identify the subaccount
     * @param string $notes optional extra text to associate with the subaccount
     * @param int $customQuota an optional manual hourly quota for the subaccount. If not specified, Mandrill will manage this based on reputation
     * @return array
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=update
     */
    public function update($id, $name = NULL, $notes = NULL, $customQuota = NULL){
        return $this->request('update', array(
            'id' => $id,
            'name' => $name,
            'notes' => $notes,
            'custom_quota' => $customQuota
        ));
    }

    /**
     * Delete an existing subaccount. Any email related to the subaccount will be saved, but stats will be removed and any future sending calls to this subaccount will fail.
     * @param string $id the unique identifier of the subaccount to delete
     * @return array
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=delete
     */
    public function delete($id){
        return $this->request('delete', array(
            'id' => $id
        ));
    }

    /**
     * Pause a subaccount's sending. Any future emails delivered to this subaccount will be queued for a maximum of 3 days until the subaccount is resumed.
     * @param string $id the unique identifier of the subaccount to pause
     * @return array
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=pause
     */
    public function pause($id){
        return $this->request('pause', array(
            'id' => $id
        ));
    }

    /**
     * Resume a paused subaccount's sending
     * @param string $id the unique identifier of the subaccount to resume
     * @return array
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=resume
     */
    public function resume($id){
        return $this->request('resume', array(
            'id' => $id
        ));
    }
}