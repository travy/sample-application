<?php

namespace App\Exceptions;

use Cake\Network\Exception\InternalErrorException;

/**
 * Specifies that an object could not be converted to JSON.
 *
 * @author Travis
 */

class JsonConversionException extends InternalErrorException
{
    public function __construct($message = null, $code = null, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
