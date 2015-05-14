<?php

namespace AcploUserRbac\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use AcploUserRbac\View\Strategy\SmartRedirectStrategy;

class SmartRedirectStrategyFactory implements FactoryInterface
{
    /**
     * gets SmartRedirectStrategy
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return SmartRedirectStrategy
     *
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new SmartRedirectStrategy($serviceLocator->get('zfcuser_auth_service'));
    }
}
