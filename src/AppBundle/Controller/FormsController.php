<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
