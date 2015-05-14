<?php
namespace AcploUserRbacTest\Factory;

use AcploUserRbac\Factory\IdentityRoleProviderFactory;
use Zend\ServiceManager\ServiceManager;
use AcploUserRbac\Identity\IdentityRoleProvider;
use AcploUserRbac\Options\ModuleOptions;
use ZfcUser\Entity\User;

class IdentityRoleProviderFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new IdentityRoleProviderFactory;
        $serviceManager = new ServiceManager;
        $serviceManager->setService('AcploUserRbac\UserRoleLinkerMapper', $this->getMock('AcploUserRbac\Mapper\UserRoleLinkerMapperInterface'));
        $serviceManager->setService('AcploUserRbac\ModuleOptions', new ModuleOptions);
        $authenticationService = $this->getMock('Zend\Authentication\AuthenticationService');
        $authenticationService->expects($this->any())
            ->method('hasIdentity')
            ->will($this->returnValue(false));
        $serviceManager->setService('zfcuser_auth_service', $authenticationService);
        $identityRoleProvider = $factory->createService($serviceManager);
        $this->assertInstanceOf('AcploUserRbac\Identity\IdentityRoleProvider', $identityRoleProvider);
        $this->assertEquals(null, $identityRoleProvider->getDefaultIdentity());
        
        $authenticationService = $this->getMock('Zend\Authentication\AuthenticationService');
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('zfcuser_auth_service', $authenticationService);
        $authenticationService->expects($this->any())
            ->method('hasIdentity')
            ->will($this->returnValue(true));
        $authenticationService->expects($this->any())
            ->method('getIdentity')
            ->will($this->returnValue($user = new User));
        $identityRoleProvider = $factory->createService($serviceManager);
        $this->assertInstanceOf('AcploUserRbac\Identity\IdentityRoleProvider', $identityRoleProvider);
        $this->assertEquals($user, $identityRoleProvider->getDefaultIdentity());
    }
}
