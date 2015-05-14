<?php

namespace AcploUserRbac\Entity;

use ZfcUser\Entity\UserInterface;

interface UserRoleLinkerInterface
{ 
    /**
     * Gets role
     *
     * @return string
     */
    public function getRoleId();
}
