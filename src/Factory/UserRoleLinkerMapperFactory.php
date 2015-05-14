<?php
namespace AcploUserRbac\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use AcploUserRbac\Mapper\UserRoleLinkerMapper;

class UserRoleLinkerMapperFactory implements FactoryInterface
{
    /**
     * Gets user role linker
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return UserRoleLinkerMapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new UserRoleLinkerMapper;
        $options = $serviceLocator->get('AcploUserRbac\ModuleOptions');
        $class = $options->getUserRoleLinkerEntityClass();
        $mapper->setEntityPrototype(new $class);
        $mapper->setDbAdapter($serviceLocator->get('AcploUserRbac\DbAdapter'));
        $mapper->setTableName($options->getTableName());

        return $mapper;
    }
}
