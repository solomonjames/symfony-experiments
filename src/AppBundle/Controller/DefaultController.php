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
        $this->flash()->success('That was amazing')->danger('ahh snap!');

        return $this->render('AppBundle:Default:flash.html.twig');
    }
}
