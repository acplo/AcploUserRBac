<?php
namespace AcploUserRbacTest\Factory;

use AcploUserRbac\Factory\ModuleOptionsFactory;
use Zend\ServiceManager\ServiceManager;

class ModuleOptionsFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new ModuleOptionsFactory;
        $serviceManager = new ServiceManager;
        $serviceManager->setService('Config', ['user_rbac' => []]);

        $this->assertInstanceof('AcploUserRbac\Options\ModuleOptions', $factory->createService($serviceManager));
    }
}
