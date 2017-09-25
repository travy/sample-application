<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

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
    
    public function search()
    {
        $resource = $this->getConfig('resourceUrl');
        $field = $this->getConfig('fieldKey');
        
        $userData = $this->request->getData();
        if (!isset($userData[$field])) {
            throw new \Exception('Missing field');
        }

        $searchTerm = $userData['search-term'];
        $results = file_get_contents($resource . urlencode($searchTerm));
        if ($results === false) {

        }

        $data = json_decode($results);
        if ($data === false) {

        }

        if (!isset($data->results) || !isset($data->term)) {

        }
        
        return [
            'term' => $data->term,
            'results' => $data->results,
        ];
    }
}
