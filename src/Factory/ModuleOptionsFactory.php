<?php
namespace AcploUserRbac\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use AcploUserRbac\Options\ModuleOptions;

class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * gets ModuleOptions
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ModuleOptions($serviceLocator->get('Config')['acplo_user_rbac']);
    }
}
