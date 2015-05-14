<?php
namespace AcploUserRbac;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements 
    ConfigProviderInterface,
    AutoloaderProviderInterface,
    ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/../autoload_classmap.php',
            ],
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceConfig()
    {
        return [
            'factories' => [
                'AcploUserRbac\ModuleOptions' => 'AcploUserRbac\Factory\ModuleOptionsFactory',
                'AcploUserRbac\UserRoleLinkerMapper' => 'AcploUserRbac\Factory\UserRoleLinkerMapperFactory',
                'AcploUserRbac\Identity\IdentityProvider' => 'AcploUserRbac\Factory\IdentityProviderFactory',
                'AcploUserRbac\Identity\IdentityRoleProvider' => 'AcploUserRbac\Factory\IdentityRoleProviderFactory',
                'AcploUserRbac\View\Strategy\SmartRedirectStrategy' => 'AcploUserRbac\Factory\SmartRedirectStrategyFactory',
            ],
            'aliases' => [
                'AcploUserRbac\DbAdapter' => 'Zend\Db\Adapter\Adapter',
                'Zend\Authentication\AuthenticationService' => 'zfcuser_auth_service',
            ]
        ];
    }
}
