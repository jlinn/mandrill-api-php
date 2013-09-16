<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 12:24 PM
 */

namespace Mandrill\Exception;


use Mandrill\Exception;

class APIException extends Exception{
    /**
     * @var string
     */
    public $status;

    /**
     * @var int
     */
    public $code;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $message;

    /**
     * @param string $message
     * @param int $code
     * @param string $status
     * @param $name
     * @param \Exception $previous
     */
    public function __construct($message, $code, $status, $name, \Exception $previous = null){
        $this->message = $message;
        $this->code = $code;
        $this->status = $status;
        $this->name = $name;
        parent::__construct($message, $code, $previous);
    }


}