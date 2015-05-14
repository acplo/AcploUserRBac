<?php

namespace AcploUserRbac\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use AcploUserRbac\Identity\IdentityRoleProvider;

class IdentityRoleProviderFactory implements FactoryInterface
{
    /**
     * Gets identity role provider
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return IdentityRoleProvider
     *
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $identityRoleProvider = new IdentityRoleProvider(
            $serviceLocator->get('AcploUserRbac\UserRoleLinkerMapper'),
            $serviceLocator->get('AcploUserRbac\ModuleOptions')
        );
        if ($serviceLocator->get('zfcuser_auth_service')->hasIdentity()) {
            $identityRoleProvider->setDefaultIdentity(
                $serviceLocator->get('zfcuser_auth_service')->getIdentity()
            );
        }

        return $identityRoleProvider;
    }
}
