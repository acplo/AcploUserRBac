<?php
namespace AcploUserRbacTest\Factory;

use AcploUserRbac\Factory\SmartRedirectStrategyFactory;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\ServiceManager;

class SmartRedirectStrategyFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new SmartRedirectStrategyFactory;
        $serviceManager = new ServiceManager;
        $serviceManager->setService('zfcuser_auth_service', new AuthenticationService);

        $this->assertInstanceOf('AcploUserRbac\View\Strategy\SmartRedirectStrategy', $factory->createService($serviceManager));
    }
}
