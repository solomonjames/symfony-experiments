<?php

namespace AppBundle\Helper;

class UserHelper implements HelperInterface
{
    private $user;

    public function username()
    {
        return $this->user->getUsername();
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getName()
    {
        return 'user';
    }
}
