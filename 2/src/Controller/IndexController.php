<?php

namespace Index\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contrats;
use App\Entity\ContratType;
use App\Entity\Offres;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/app", name="app")
     */
    public function index()
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'Cyrian',
        ]);
    }
    /**
     * @Route("/about", name="about")
     */
    public function about_show()
    {
        return $this->render('app/about.html.twig');
    }
}

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $Offres = $this->getDoctrine()
            ->getRepository(Offres::class)
            ->findAll();
        return $this->render('home/index.html.twig', [
            'offres' => $Offres,
        ]);
    }
    /**
     * @Route("/offre/{id}", name="show_post")
     */
    public function show(Offres $offre)
    {
        return $this->render('home/offre.html.twig', [
            'offre' => $offre
        ]);
    }

    /**
     * @Route("/create_offre", name="create_offre")
     */
    public function create(Request $request, EntityManagerInterface $em)
    {

        $new_offre = new Offres;
        $new_contrat = new Contrats();
        $new_contrattype = new ContratType();

        $form = $this->createFormBuilder($new_offre)
        ->add("Title", TextType::class, [
            'attr' => [
                "class" => "exit"
            ]
        ])
        ->add("Description", TextareaType::class, [
            'attr' => [
                "class" => "exit"
            ]
        ])
        ->add("Ville", TextType::class, [
            'attr' => [
                "class" => "exit"
            ]
        ])
        ->add("Contrat", TextType::class, [
            'attr' => [
                "class" => "exit"
            ],
            'help' => 'CDI, CDD ou free'
        ])
        ->add("Contrat_type", TextType::class, [
            'attr' => [
                "class" => "exit"
            ],
            'help' => 'plein ou partiel'
        ])
        ->add("adresse", TextType::class, [
            'attr' => [
                "class" => "exit"
            ]
        ])
        ->add("code_postal", IntegerType::class, [
            'attr' => [
                "class" => "exit"
            ]
        ])
        ->add("fin_mission", DateType::class, [
            'attr' => [
                "class" => "exit"
            ]
        ])
        ->add("submit", SubmitType::class)
        ->getForm();

        $new_offre->setDateCreation(new \DateTime());

        $form->handleRequest($request);

                if ($new_offre->getContrat() === 'CDI') {
                    $new_contrat->SetCDI(1)
                        ->SetCDD(0)
                        ->Setfree(0);
                }
                else if ($new_offre->getContrat() === 'CDD') {
                    $new_contrat->SetCDI(0)
                        ->SetCDD(1)
                        ->Setfree(0);
                }
                else if ($new_offre->getContrat() === 'free') {
                    $new_contrat->SetCDI(0)
                        ->SetCDD(0)
                        ->Setfree(1);
                }

                if ($new_offre->getContratType() === 'plein') {
                    $new_contrattype->setPartiel(0)
                        ->setPlein(1);
                }
                else if ($new_offre->getContratType() === 'partiel') {
                    $new_contrattype->setPartiel(1)
                        ->setPlein(0);
                }

                $em->persist($new_contrattype);
                $em->persist($new_contrat);
                $em->persist($new_offre);
                $em->flush();

                return new RedirectResponse('/o\');
            }
        }

        return $this->render('home/create.html.twig', [
            "form" => $form->createView()
        ]);
    }
}