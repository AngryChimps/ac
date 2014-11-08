<?php

namespace AngryChimps\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MemberController
 * @package AngryChimps\ApiBundle\Controller
 *
 * @Route("/member")
 */
class MemberController extends AbstractController
{
    /**
     * @Route("/{key}")
     * @Method({"GET"})
     */
    public function indexGetAction($key)
    {
        $data = array(
                "screenname" => $key
            );

        $view = $this->view($data, 200)->setFormat('json');

        return $this->handleView($view);
    }

    /**
     * @Route("/{key}")
     * @Method({"POST"})
     */
    public function indexPostAction($key, Request $request) {
        $content = $this->getContent($request);
        $view = $this->view($content);

        return $this->handleView($view);
    }

}
