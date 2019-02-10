<?php
/**
 * Created by PhpStorm.
 * User: artsemmiklashevich
 * Date: 2019-02-05
 * Time: 11:32
 */

namespace MagentoPlus\ConfigMerge\Test\Integration\Model\Config;

use Magento\TestFramework\ObjectManager;
use MagentoPlus\ConfigInvestigation\Model\Config\Data;

class DataMergeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Data
     */
    private $model;
    /**
     * @var  ObjectManager
     */
    private $objectManager;

    protected function setUp()
    {
        /**
         * @var ObjectManager
         **/
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->model = $this->objectManager->create(Data::class);
    }

    /**
     * @magentoCache config disabled
     */
    public function testConfigMerge()
    {
        $additionalAttributes = $this->model->get('mapping_variations');
        $this->assertEquals(4, \count($additionalAttributes));
        $this->assertTrue(is_array($additionalAttributes));
        $this->assertArrayHasKey('Color', $additionalAttributes);
    }
}
