<?php
/**
 * User: Joe Linn
 * Date: 9/13/13
 * Time: 11:48 AM
 */

namespace Mandrill\Struct;

use Mandrill\Struct;

class Attachment extends Struct{
    /**
     * @var string the MIME type of the attachment
     */
    public $type;

    /**
     * @var string the file name of the attachment
     */
    public $name;

    /**
     * @var string the content of the attachment as a base64-encoded string
     */
    public $content;
}