<?php
namespace AcploUserRbacTest\Factory;

use AcploUserRbac\Factory\IdentityProviderFactory;
use Zend\ServiceManager\ServiceManager;

class IdentityProviderFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new IdentityProviderFactory;
        $serviceManager = new ServiceManager;
        $identityRoleProvider = $this->getMockBuilder('AcploUserRbac\Identity\IdentityRoleProvider')
            ->disableOriginalConstructor()
            ->getMock();
        $serviceManager->setService('AcploUserRbac\Identity\IdentityRoleProvider', $identityRoleProvider);
        $this->assertInstanceOf('AcploUserRbac\Identity\IdentityProvider', $factory->createService($serviceManager));
    }
}
