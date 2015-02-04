<?php

namespace AppBundle\Security\UserAware;

use Symfony\Component\Security\Core\User\UserInterface;

interface UserAwareInterface
{
    public function setUser(UserInterface $user);

    public function getUser();
}
