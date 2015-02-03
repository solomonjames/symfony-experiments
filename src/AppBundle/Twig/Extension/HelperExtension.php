<?php

namespace AppBundle\Twig\Extension;

use AppBundle\Helper\HelperBag;

class HelperExtension extends \Twig_Extension
{
    /**
     * @var HelperBag
     */
    protected $helperBag;

    /**
     * @param HelperBag
     */
    public function __construct(HelperBag $helperBag)
    {
        $this->helperBag = $helperBag;
    }

    /**
     * Returns a list of global variables to add to the existing list.
     *
     * @return array An array of global variables
     */
    public function getGlobals()
    {
        return array('helper' => $this->helperBag);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'helper';
    }
}
