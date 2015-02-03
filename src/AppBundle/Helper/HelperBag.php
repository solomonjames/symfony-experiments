<?php

namespace AppBundle\Helper;

class HelperBag
{
    protected $helpers = [];

    public function __call($name, $arguments)
    {
        if ($this->hasHelper($name)) {
            return $this->getHelper($name);
        }
    }

    public function addHelper($helper, $alias = null)
    {
        $name = $alias;
        if (null === $name && $helper instanceof HelperInterface) {
            $name = $helper->getName();
        }

        $this->helpers[$name] = $helper;

        return $this;
    }

    public function getHelper($name)
    {
        return $this->helpers[$name];
    }

    public function hasHelper($name)
    {
        return isset($this->helpers[$name]);
    }
}
