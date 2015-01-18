<?php

namespace AppBundle\Controller\Helpers;

class FlashHelper
{
    protected $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function add($type, $message)
    {
        $this->session->getFlashBag()->add($type, $message);

        return $this;
    }
}
