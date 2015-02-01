<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class Controller extends BaseController
{
    public function __call($name, $arguments)
    {
        if ($this->get('app.bundle.controller.helper_bag')->hasHelper($name)) {
            return $this->helper($name);
        }
    }

    protected function parameter($name)
    {
        return $this->controller->getParameter($name);
    }

    protected function session()
    {
        return $this->get('session');
    }

    protected function helper($name)
    {
        return $this->get('app.bundle.controller.helper_bag')->getHelper($name);
    }
}
