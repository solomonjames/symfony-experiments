<?php

namespace AppBundle\Helper;

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

    public function success($message = null)
    {
        return $this->handle('success', $message);
    }

    public function info($message = null)
    {
        return $this->handle('info', $message);
    }

    public function warning($message = null)
    {
        return $this->handle('warning', $message);
    }

    public function danger($message = null)
    {
        return $this->handle('danger', $message);
    }

    protected function handle($type, $message = null)
    {
        // If there is no message, then execute as a getter
        if (null === $message) {
            return $this->session->getFlashBag()->get($type);
        } else {
            return $this->add($type, $message);
        }
    }
}
