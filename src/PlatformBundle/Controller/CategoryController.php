<?php

namespace PlatformBundle\Controller;

use PlatformBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{

    public function menuAction()
    {
        $categories=$this->getDoctrine()->getRepository('PlatformBundle:Category')->findAll();

        return $this->render('PlatformBundle:category:menu.html.twig',array('categories'=>$categories));
    }
}
