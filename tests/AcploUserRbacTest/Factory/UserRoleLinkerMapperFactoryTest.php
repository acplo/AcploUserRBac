<?php
namespace AcploUserRbacTest\Factory;

use AcploUserRbac\Factory\UserRoleLinkerMapperFactory;
use Zend\ServiceManager\ServiceManager;
use AcploUserRbac\Options\ModuleOptions;

class UserRoleLinkerMapperFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new UserRoleLinkerMapperFactory;
        $serviceManager = new ServiceManager;
        $serviceManager->setService('AcploUserRbac\ModuleOptions', new ModuleOptions);
        $adapter = $this->getMockBuilder('Zend\Db\Adapter\Adapter')
            ->disableOriginalConstructor()
            ->getMock();
        $serviceManager->setService('AcploUserRbac\DbAdapter', $adapter);

        $this->assertInstanceOf('AcploUserRbac\Mapper\UserRoleLinkerMapper', $factory->createService($serviceManager));
    }
}
