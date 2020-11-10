<?php

namespace UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use UtilisateurBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;


/**
 *
 * Class UtilisateurAdminController
 * @package UtilisateurBundle\Controller
 * @Route("admin/user")
 */
class UtilisateurAdminController extends Controller
{

    /**
     * Lists all utilisateur entities.
     *
     * @Route("/", name="admin_utilisateur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $utilisateur=$this->container->get('security.token_storage')->getToken()->getUser();


        $utilisateurs = $em->getRepository('UtilisateurBundle:Utilisateur')->findAllExceptAdmin($utilisateur->getId());


        return $this->render('UtilisateurBundle:UtilisateurAdmin:index.html.twig', array(
            'utilisateurs' => $utilisateurs));
    }


    /**
     * Finds and displays a page entity.
     *
     * @Route("/{id}", name="admin_utilisateur_show")
     * @Method("GET")
     * @param Utilisateur $utilisateur
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Utilisateur $utilisateur)
    {
        $deleteForm = $this->createDeleteForm($utilisateur);

        return $this->render('UtilisateurBundle:UtilisateurAdmin:show.html.twig', array(
            'utilisateur' => $utilisateur,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing page entity.
     *
     * @Route("/{id}/edit", name="admin_utilisateur_edit")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param Utilisateur $Utilisateur
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Utilisateur $utilisateur)
    {
        $deleteForm = $this->createDeleteForm($utilisateur);
        $editForm = $this->createForm('UtilisateurBundle\Form\UtilisateurType', $utilisateur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('notice', "Utilisateur a bien été modifiée.");

            return $this->redirectToRoute('admin_utilisateur_edit', array('id' => $utilisateur->getId()));
        }

        return $this->render('UtilisateurBundle:utilisateurAdmin:edit.html.twig', array(
            'utilisateur' => $utilisateur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Deletes a page entity.
     *
     * @Route("/{id}", name="admin_utilisateur_delete")
     * @Method("DELETE")
     * @param Request $request
     * @param Utilisateur $utilisateur
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Utilisateur $utilisateur)
    {
        $form = $this->createDeleteForm($utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($utilisateur);
            $em->flush();
        }

        return $this->redirectToRoute('admin_utilisateur_index');
    }


    /**
     * Creates a form to delete a page entity.
     *
     * @param Utilisateur $utilisateur
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Utilisateur $utilisateur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_utilisateur_delete', array('id' => $utilisateur->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
