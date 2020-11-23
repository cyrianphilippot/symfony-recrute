<?php

namespace PlatformBundle\Controller;

use PlatformBundle\Entity\Advert;
use PlatformBundle\Entity\Application;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/application")
 */
class ApplicationController extends Controller
{

    /**
     * Creates a new page entity.
     *
     * @Route("/postule/{slug}", name="platform_application_postule")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param Advert $advert
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function postuleAction(Request $request,Advert $advert)
    {
        $application = new Application();
        $application->setAdvert($advert);

        $utilisateur=$this->container->get('security.token_storage')->getToken()->getUser();
        $application->setDate(new \Datetime());
        $application->setUtilisateur($utilisateur);
        $application->setAuthor($utilisateur->getEmail());


        if($utilisateur == 'anon.'){

            return $this->redirectToRoute('fos_user_security_login');
        }

        $form = $this->createForm('PlatformBundle\Form\ApplicationType', $application);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($application);
            $em->flush();

            $this->get('session')->getFlashBag()->Add('success', 'Votre candidature viens d\'être transmis, Merci à vous !');

            return $this->redirectToRoute('platform_view',array('slug' => $advert->getSlug()));
        }

        return $this->render('PlatformBundle:application:postule.html.twig',array(
            'application'=>$application,
            'form' => $form->createView(),
        ));
    }



    /**
     *
     * @Route("/candidatures", name="platform_application")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function candidaturesAction()
    {


        $utilisateur=$this->container->get('security.token_storage')->getToken()->getUser();
        $listApplications= $this->getDoctrine()
            ->getRepository('PlatformBundle:Application')
            ->findBy(['utilisateur'=>$utilisateur]);
        if($utilisateur == 'anon.'){

            return $this->redirectToRoute('fos_user_security_login');
        }

        return $this->render('PlatformBundle:application:candidatures.html.twig', array(
            'listApplications' => $listApplications,

        ));
    }


    /**
     * Finds and displays a advert entity.
     *
     * @Route("/{id}", name="platform_application_view")
     * @Method("GET")
     * @param Application $application
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(Application $application)
    {
        $deleteForm = $this->createDeleteForm($application);

        return $this->render('PlatformBundle:application:view.html.twig', array(
            'application' => $application,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Deletes a application entity.
     *
     * @Route("/{id}", name="platform_application_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Application $application)
    {

        $form = $this->createDeleteForm($application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->remove($application);
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', "Votre Candidature a bien été supprimée.");
        }

        return $this->redirectToRoute('platform_application');
    }

    /**
     * Creates a form to delete a category entity.
     *
     * @param Application $application
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Application $application)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('platform_application_delete', array('id' => $application->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }


}
