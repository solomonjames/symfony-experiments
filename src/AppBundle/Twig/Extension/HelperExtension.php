<?php

namespace AppBundle\Twig\Extension;

use AppBundle\Controller\Helper\HelperBag;

class HelperExtension extends \Twig_Extension
{
    protected $helperBag;

    public function __construct(HelperBag $helperBag)
    {
        $this->helperBag = $helperBag;
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('helper', array($this, 'geHelper')),
        );
    }

    public function getHelper()
    {
        return $this->helperBag;
    }

    public function getName()
    {
        return 'helper';
    }
}
