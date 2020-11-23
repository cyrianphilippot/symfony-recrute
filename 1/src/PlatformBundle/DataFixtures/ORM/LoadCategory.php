<?php
// src/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PlatformBundle\Entity\Category;

class LoadCategory extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
      $Category1 = new Category();
      $Category1->setName('Développement web');
      $manager->persist($Category1);

      $Category2 = new Category();
      $Category2->setName('Développement mobile');
      $manager->persist($Category2);


      $Category3 = new Category();
      $Category3->setName('Graphisme');
      $manager->persist($Category3);

      $Category4 = new Category();
      $Category4->setName('Intégration');
      $manager->persist($Category4);


      $Category5 = new Category();
      $Category5->setName('Réseau');
      $manager->persist($Category5);


      $manager->flush();

      $this->addReference('category1',$Category1);
      $this->addReference('category2',$Category2);
      $this->addReference('category3',$Category3);
      $this->addReference('category4',$Category4);
      $this->addReference('category5',$Category5);

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
        return 2;
    }
}