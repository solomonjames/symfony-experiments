<?php

namespace AppBundle\Security\UserAware;

use Symfony\Component\Security\Core\User\UserInterface;

abstract class UserAware implements UserAwareInterface
{
    protected $user;

    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }
}
