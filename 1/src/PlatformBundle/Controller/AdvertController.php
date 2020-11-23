<?php

namespace PlatformBundle\Controller;

use PlatformBundle\Entity\Advert;
use PlatformBundle\Entity\Application;
use PlatformBundle\Entity\Category;
use PlatformBundle\Entity\Image;
use PlatformBundle\Entity\Skill;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * @Route("/platform")
 */
class AdvertController extends Controller
{
    /**
     * @Route("/", name="platform_home")
     * @Route("/category/{category}", name="advertsByCategorie")
     * @Route("/skill/{skill}", name="advertsBySkill")
     * @param Category $category
     * @param Skill|null $skill
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request,Category $category = null , Skill $skill = null)
    {
        $em = $this->getDoctrine()->getManager();

        if ($category == null and $skill==null) {
            $listAdverts = $em->getRepository('PlatformBundle:Advert')->findBy(array('published' => true ),                 // Pas de critère
                array('date' => 'desc')
            );
        } elseif($skill != null) {
            $listAdverts = $em->getRepository('PlatformBundle:Advert')->advertsBySkill($skill);
        }else {
            $listAdverts = $em->getRepository('PlatformBundle:Advert')->advertsByCategorie($category);
        }


        $adverts =  $this->get('knp_paginator')->paginate(
            $listAdverts, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            6/*limit per page*/
        );

        // On donne toutes les informations nécessaires à la vue
        return $this->render('PlatformBundle:advert:index.html.twig', array(
            'listAdverts' => $adverts,'category'=>$category,'skill'=>$skill
        ));
    }

    /**
     * @Route("/advert/{slug}" , name="platform_view" )
     * @param Advert $advert
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction( Advert $advert )
    {

        $em = $this->getDoctrine()->getManager();

        // $advert=$this->getDoctrine()->getRepository("BenPagesBundle:Pages")->findOneBy(array('slug'=>$slug));

        // Récupération de la liste des candidatures de l'annonce
        $listApplications = $em
            ->getRepository('PlatformBundle:Application')
            ->findOneBy(array('advert' => $advert));

        return $this->render('PlatformBundle:advert:view.html.twig', array(
            'advert' => $advert,
            'listApplications' => $listApplications
        ));
    }


    public function menuAction( $limit )
    {
        // On fixe en dur une liste ici, bien entendu par la suite
        // on la récupérera depuis la BDD !
        $listAdverts = $this->getDoctrine()
            ->getRepository("PlatformBundle:Advert")
            ->findBy(array('published' => true ),                 // Pas de critère
                array('date' => 'desc'), // On trie par date décroissante
                $limit,                  // On sélectionne $limit annonces
                0
            );
        return $this->render('PlatformBundle:advert:menu.html.twig', array(
            // Tout l'intérêt est ici : le contrôleur passe les variables nécessaires au template !
            'listAdverts' => $listAdverts
        ));
    }


}
