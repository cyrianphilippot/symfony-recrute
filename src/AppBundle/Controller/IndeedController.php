<?php
/**
 * Created by PhpStorm.
 * User: Cyrian
 * Date: 02/11/2020
 * Time: RAS
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class BlogController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository(Article::class);
        $articles = $repository->findAll();

        $templating = $this->get('templating');

        $html = $templating->render('blog/index.html.twig', compact('articles'));

        return new Response($html);
    }

    /**
     * @Route("/article", name="article")
     */
    public function articleAction()
    {
        $id = $_GET['id'];

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Article::class);
        $article = $repository->find($id);

        $templating = $this->get('templating');

        $html = $templating->render('blog/article.html.twig', compact('article'));

        return new Response($html);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository(Article::class);

        $articles = $repository->findAll();

        $templating = $this->get('templating');

        $html = $templating->render('blog/admin/index.html.twig',compact('articles'));

        return new Response($html);
    }

    /**
     * @Route("/article_delete", name="article_delete")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction(Request $request)
    {
        $id = $_GET['id'];

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Article::class);
        $article = $repository->find($id);

        $em->remove($article);
        $em->flush();

        $request->getSession()->getFlashBag()->add('success', 'Article supprimé.');

        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/edit", name="edit")
     */
    public function editAction(Request $request)
    {
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository(Article::class);
            $article = $repository->find($id);
        }else{
            $article = new Article();
        }

        $form = $this->get('form.factory')->createBuilder(FormType::class, $article)
            ->add('tittle',     TextType::class)
            ->add('content',   TextareaType::class)
            ->add('envoyer',      SubmitType::class)
            ->getForm()
        ;

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();

                if (!isset($_GET['id'])){
                    $request->getSession()->getFlashBag()->add('success', 'Article ajouté.');
                }else{
                    $request->getSession()->getFlashBag()->add('success', 'Article modifié.');
                }

                return $this->redirectToRoute('admin', array('id' => $article->getId()));
            }
        }

        return $this->render('blog/admin/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/members", name="members")
     */
    public function membersAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('blog/admin/members.html.twig', array('users' =>   $users));
    }

    /**
     * @Route("boutique" , name="boutique")
     */
    public function boutiqueAction(Request $request)
    {
        \Stripe\Stripe::setApiKey("sk_test_MpSdpgU01U7sCw6mfRq83Xdf");

        if ($request->isMethod('POST')){
            $customer = \Stripe\Customer::create(array(
                'source' => $_POST['stripeToken'],
                'email' => $_POST['stripeEmail']
            ));
        }else{
            $customer = '';
        }


        return $this->render('blog/boutique.html.twig', compact('customer'));
    }

}