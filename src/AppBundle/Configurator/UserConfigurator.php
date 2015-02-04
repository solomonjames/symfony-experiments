<?php

namespace AppBundle\Configurator;

use Symfony\Component\Security\Core\SecurityContext;

/**
 * Responsible for injecting just the actual user object into a service.
 *
 * This makes it easier to deal with getting the user object, and not
 *     having to deal with the security context all the time.
 */
class UserConfigurator
{
    private $securityContext;

    public function __construct(SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    public function configure($userDependentClass)
    {
        if (is_callable(array($userDependentClass, 'setUser')) && null !== $this->getUser()) {
            $userDependentClass->setUser($this->getUser());
        }

        return $this;
    }

    protected function getUser()
    {
        if (null === $token = $this->securityContext->getToken()) {
            return null;
        }

        if (!is_object($user = $token->getUser())) {
            return null;
        }

        return $user;
    }
}
