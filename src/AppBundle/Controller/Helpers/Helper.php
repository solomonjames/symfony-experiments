<?php

namespace AppBundle\Controller\Helpers;

class Helper
{
    protected $helpers = array();

    public function addHelper($helper, $alias = null)
    {
        $name = $alias;
        if (null === $name) {
            $name = $helper->getName();
        }

        $this->helpers[$name] = $helper;

        return $this;
    }

    public function getHelper($name)
    {
        return $this->helpers[$name];
    }
}
