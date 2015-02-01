<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/flash", name="flash")
     */
    public function flashAction()
    {
        $this->flash()->add('poop', 'i am pooping')
                      ->success('That was amazing')
        ;

        return 'Hello';
    }
}
