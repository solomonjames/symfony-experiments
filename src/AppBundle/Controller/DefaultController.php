<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        var_dump($this->flash()->add('poop', 'i am pooping'));
        return new \Symfony\Component\HttpFoundation\Response('Hello');
    }
}
