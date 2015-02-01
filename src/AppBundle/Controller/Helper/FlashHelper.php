<?php

namespace AppBundle\Controller\Helper;

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

    public function success($message)
    {
        return $this->add('success', $message);
    }

    public function info($message)
    {
        return $this->add('info', $message);
    }

    public function warning($message)
    {
        return $this->add('warning', $message);
    }

    public function danger($message)
    {
        return $this->add('danger', $message);
    }
}
