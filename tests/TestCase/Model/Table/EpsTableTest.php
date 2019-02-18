<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EpsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EpsTable Test Case
 */
class EpsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EpsTable
     */
    public $Eps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.eps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Eps') ? [] : ['className' => EpsTable::class];
        $this->Eps = TableRegistry::getTableLocator()->get('Eps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Eps);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
