<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadAdvert.php

namespace PlatformBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PlatformBundle\Entity\Advert;


class LoadAdvert extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
      /******   Création 4  annonces sans candidatures ********************************************************************/

      // Création de l'entité date 2018-01-01
      $advert8 = new Advert();
      $advert8->setTitle('Recherche développeur Symfony.');
      $advert8->setAuthor('Alexandre@email.com');
      $advert8->setPublished(false);
      $advert8->setDate(new \DateTime('2018-01-21'));
      $advert8->setContent("Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…");

      // On lie l'image à l'annonce
     // $advert8->setImage($this->getReference('media1'));

      $advert8->addCategory($this->getReference('category4'));
      $advert8->addCategory($this->getReference('category5'));
      $advert8->addCategory($this->getReference('category2'));



      //On « persiste » l'entité
      $manager->persist($advert8);

      /********************************************************************************************************/

      // Création de l'entité  aujourd'hui
      $advert7 = new Advert();
      $advert7->setTitle('Recherche développeur JS.');
      $advert7->setAuthor('pascal@email.com');
      $advert7->setPublished(false);
      $advert7->setContent("Nous recherchons un développeur JS débutant sur Lille");

      // On lie l'image à l'annonce
   //   $advert7->setImage($this->getReference('media2'));
      $advert7->addCategory($this->getReference('category2'));
      $advert7->addCategory($this->getReference('category5'));
      $advert7->addCategory($this->getReference('category3'));

      // On « persiste » l'entité
      $manager->persist($advert7);

      /********************************************************************************************************/

      // Création de l'entité date 2018-01-01
      $advert6 = new Advert();
      $advert6->setTitle('Recherche développeur C#.');
      $advert6->setAuthor('marc@email.com');
      $advert6->setPublished(false);
      $advert6->setDate(new \DateTime('2018-01-01'));
      $advert6->setContent("Nous recherchons un développeur C# sur Lyon");

      // On lie l'image à l'annonce
   //   $advert6->setImage($this->getReference('media3'));
      $advert6->addCategory($this->getReference('category1'));
      $advert6->addCategory($this->getReference('category4'));
      $advert6->addCategory($this->getReference('category2'));

      // On « persiste » l'entité
      $manager->persist($advert6);


      /********************************************************************************************************/

      // Création de l'entité 2018-01-20
      $advert5 = new Advert();
      $advert5->setTitle('Recherche développeur WEB.');
      $advert5->setAuthor('sara@email.com');
      $advert5->setPublished(false);
      $advert5->setDate(new \DateTime('2018-01-20'));
      $advert5->setContent("Nous recherchons un développeur HTML débutant sur Paris");

      // On lie l'image à l'annonce
    //  $advert5->setImage($this->getReference('media4'));
      $advert5->addCategory($this->getReference('category1'));
      $advert5->addCategory($this->getReference('category5'));
      $advert5->addCategory($this->getReference('category2'));

      //  On « persiste » l'entité
      $manager->persist($advert5);
      /********************************************************************************************************/

      // Création de l'entité 2018-01-18
      $advert4 = new Advert();
      $advert4->setTitle('Recherche développeur Prestashop.');
      $advert4->setAuthor('admin@email.com');
      $advert4->setPublished(false);
      $advert4->setDate(new \DateTime('2018-01-18'));
      $advert4->setContent("Nous recherchons un développeur Prestashop débutant sur Lyon");

      // On lie l'image à l'annonce
    //  $advert4->setImage($this->getReference('media5'));
      $advert4->addCategory($this->getReference('category1'));
      $advert4->addCategory($this->getReference('category4'));
      $advert4->addCategory($this->getReference('category2'));

      //  On « persiste » l'entité
      $manager->persist($advert4);

      /********************************************************************************************************/

      // Création de l'entité 2018-01-10
      $advert3 = new Advert();
      $advert3->setTitle('Recherche développeur CSS.');
      $advert3->setAuthor('salim@email.com');
      $advert3->setPublished(false);
      $advert3->setDate(new \DateTime('2018-01-14'));
      $advert3->setContent("Nous recherchons un développeur CSS débutant sur Lyon");

      // On lie l'image à l'annonce
   //   $advert3->setImage($this->getReference('media6'));
      $advert3->addCategory($this->getReference('category1'));
      $advert3->addCategory($this->getReference('category4'));
      $advert3->addCategory($this->getReference('category3'));

      //  On « persiste » l'entité
      $manager->persist($advert3);
      /********************************************************************************************************/


      // Création de l'entité 2017-12-20
      $advert2 = new Advert();
      $advert2->setTitle('Recherche développeur HTML.');
      $advert2->setAuthor('amin@email.com');
      $advert2->setPublished(false);
      $advert2->setDate(new \DateTime('2017-12-20'));
      $advert2->setContent("Nous recherchons un développeur CHTMLSS débutant sur Lyon");

   //   $advert2->setImage($this->getReference('media7'));
      $advert2->addCategory($this->getReference('category1'));
      $advert2->addCategory($this->getReference('category2'));
      $advert2->addCategory($this->getReference('category3'));


      //  On « persiste » l'entité
      $manager->persist($advert2);
      /********************************************************************************************************/


      // Création de l'entité 2017-10-10
      $advert1 = new Advert();
      $advert1->setTitle('Recherche développeur SQL.');
      $advert1->setAuthor('Alain@email.com');
      $advert1->setPublished(false);
      $advert1->setDate(new \DateTime('2017-10-10'));
      $advert1->setContent("Nous recherchons un développeur SQL débutant sur Lyon");

      // On lie l'image à l'annonce
      //  $advert1->setImage($this->getReference('media8'));
      $advert1->addCategory($this->getReference('category3'));
      $advert1->addCategory($this->getReference('category4'));
      $advert1->addCategory($this->getReference('category5'));

      //  On « persiste » l'entité
      $manager->persist($advert1);
      /********************************************************************************************************/


      $manager->flush();




      $this->addReference('advert1', $advert1);
      $this->addReference('advert2', $advert2);
      $this->addReference('advert3', $advert3);
      $this->addReference('advert4', $advert4);
      $this->addReference('advert5', $advert5);
      $this->addReference('advert6', $advert6);
      $this->addReference('advert7', $advert7);
      $this->addReference('advert8', $advert8);





      /*

         $Enrs = array();
       $Enrs[0] = array('Author'=>'Alexandre', 'title'=>'Recherche développeur Symfony', 'slug'=>'Recherche_developpeur',
            'content'=>"Nous recherchons un développeur Symfony débutant sur Lyon");
       $Enrs[1] = array('Author'=>'ProEmploi', 'title'=>'Agent commercial en immobilier H/F sur Versailles', 'slug'=>'Agent_Commercial',
            'content'=>"SEXTANT France offre une opportunité de construire une carrière professionnelle dans le domaine de l'immobilier. Vous serez formé par nos experts, accompagné personnellement ");
       $Enrs[2] = array('Author'=>'Pro Multimédia', 'title'=>'Photographe , photo vendeuse (H/F)', 'slug'=>'Photographe_vendeuse',
            'content'=>"groupe evenementiel recherche pour ces activites , (h/f) , pour prises de vues et vente de photo , sur paris et ile de france , formation assuree , debutant (e) acceptes .
                envoyer cv");


       foreach ($Enrs as $enr) {

      $advert = new Advert();
      $advert->setAuthor($enr['Author']);
      $advert->setTitle($enr['title']);
      $advert->setContent($enr['content']);
    //  $advert->setSlug($enr['slug']);
      $advert->setUpdatedAt(new \DateTime());
      $image = $manager->getRepository('OCPlatformBundle:Image')->find(2);

      $advert->setImage($image);

      $categorie1 = $manager->getRepository('OCPlatformBundle:Category')->find(126);
      $categorie2 = $manager->getRepository('OCPlatformBundle:Category')->find(128);
      $advert->addCategory($categorie1);
      $advert->addCategory($categorie2);

      $manager->persist($advert);
      $manager->flush();

     }



      */
  }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }


}