<?php
namespace App\Exceptions;

use Cake\Network\Exception\InternalErrorException;

/**
 * Specifies that a connection failed while accessing a resource.
 *
 * @author Travis
 */
class ResourceConnectionFailedException extends InternalErrorException {
    public function __construct($message = null, $code = null, $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
