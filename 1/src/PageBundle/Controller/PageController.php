<?php

namespace PageBundle\Controller;

use PageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Page controller.
 *
 * @Route("page")
 */
class PageController extends Controller
{

    /**
     * Finds and displays a page entity.
     *
     * @Route("/{slug}", name="page_show")
     * @Method("GET")
     */
    public function showAction(Page $page)
    {

        return $this->render('PageBundle:page:show.html.twig', array(
            'page' => $page,
        ));
    }


    public function menuAction($limit)
    {
        // On fixe en dur une liste ici, bien entendu par la suite
        // on la récupérera depuis la BDD !
        $listPages=$this->getDoctrine()
            ->getRepository("PageBundle:Page")
            ->findBy( array(),                 // Pas de critère
                array('created' => 'desc'), // On trie par date décroissante
                $limit,                  // On sélectionne $limit annonces
                0
            );

        return $this->render('PageBundle:page:menu.html.twig', array(
            // Tout l'intérêt est ici : le contrôleur passe les variables nécessaires au template !
            'listPages' => $listPages
        ));
    }

}
