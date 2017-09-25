<?php
namespace App\Controller\Component;

use App\Util\ResourceLoader;

use Cake\Controller\Component;

use Exception;

/**
 * Mapper component
 * 
 * The Mapper Component will automatically take the data provided from the
 * interface and pass it to the restful service.
 * 
 * Afterwords it will map it into a data array which CakePHP can use to create
 * an Entity which will be saved to the database.
 */
class MapperComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'resourceUrl' => 'http://echo.jsontest.com/results/10/term/',
        'fieldKey' => 'search-term',
    ];
    
    /**
     * Search for the desired data field on the RESTful resource specified.
     *
     * @return type
     * @throws Exception
     */
    public function search()
    {
        //  acquire the supplied data field or throw an exception
        $field = $this->getConfig('fieldKey');
        $userData = $this->request->getData();
        if (!isset($userData[$field])) {
            throw new Exception('Missing field');
        }
        
        //  retrieve the response from the restful server
        $resource = $this->getConfig('resourceUrl');
        $resourceLoader = new ResourceLoader($resource);
        $data = $resourceLoader->search($userData[$field]);
        
        return [
            'term' => $data->term,
            'results' => $data->results,
        ];
    }
}
