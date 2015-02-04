<?php

namespace AppBundle\Helper;

use AppBundle\Security\UserAware\UserAwareTrait;

class UserHelper implements HelperInterface
{
    use UserAwareTrait;

    public function username()
    {
        return $this->getUser()->getUsername();
    }

    public function getName()
    {
        return 'user';
    }
}
