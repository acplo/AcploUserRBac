<?php
namespace AcploUserRbac\Options;

interface ModuleOptionsInterface
{
    public function getTableName();

    public function getDefaultGuestRole();

    public function getDefaultUserRole();

    public function getUserRoleLinkerEntityClass();
}
