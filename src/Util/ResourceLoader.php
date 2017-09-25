<?php
namespace App\Util;

use InvalidArgumentException;

use App\Exceptions\ResourceConnectionFailedException;
use App\Exceptions\JsonConversionException;

/**
 * Description of ResourceLoader
 *
 * @author Travis
 */
class ResourceLoader
{
    private $resource;
    
    /**
     * Maps the RESTful resource URL to the object or throws an exception if
     * the supplied URL is invalid.
     *
     * @param type $resource
     * @throws Exception
     */
    public function __construct($resource)
    {
        if (!filter_var($resource, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException('An invalid URL was supplied');
        }
        
        $this->resource = $resource;
    }
    
    /**
     * Will search the resource server with the supplied search value and return
     * the results as a JSON object.
     *
     * @param type $value
     * @return type
     * @throws Exception
     */
    public function search($value)
    {
        $requestUrl = $this->resource . urlencode($value);
        $results = file_get_contents($requestUrl);
        if ($results === false) {
            throw new ResourceConnectionFailedException('Was unable to connecto the the resource at:  ' . $requestUrl);
        }
        
        //  convert the acquired data to a json object
        $json = json_decode($results);
        if (is_null($json)) {
            throw new JsonConversionException('The acquired results could not be converted to a valid JSON object');
        }
        
        return $json;
    }
}
