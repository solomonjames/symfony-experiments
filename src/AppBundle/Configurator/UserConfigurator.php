<?php

namespace AppBundle\Configurator;

use Symfony\Component\Security\Core\SecurityContext;

class UserConfigurator
{
    private $securityContext;

    public function __construct(SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    public function configure($someClass)
    {
        $someClass->setUser($this->getUser());

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
