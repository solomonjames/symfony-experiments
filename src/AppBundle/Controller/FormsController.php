<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/forms")
 */
class FormsController extends Controller
{
    /**
     * @Route("", name="forms.home")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Forms:index.html.twig');
    }
}
