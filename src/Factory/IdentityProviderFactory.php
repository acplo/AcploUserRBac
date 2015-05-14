<?php
namespace AcploUserRbac\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use AcploUserRbac\Identity\IdentityProvider;

class IdentityProviderFactory implements FactoryInterface
{
    /**
     * Gets identity provider
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return IdentityProvider
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new IdentityProvider($serviceLocator->get('AcploUserRbac\Identity\IdentityRoleProvider'));
    }
}
