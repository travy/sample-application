<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\MapperComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\MapperComponent Test Case
 */
class MapperComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\MapperComponent
     */
    public $Mapper;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Mapper = new MapperComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mapper);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
