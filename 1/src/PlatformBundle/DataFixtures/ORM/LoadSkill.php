<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadSkill.php

namespace PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PlatformBundle\Entity\Skill;

class LoadSkill extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {

      $skill1 = new Skill();
      $skill1->setName('PHP');
      $manager->persist($skill1);

      $skill2 = new Skill();
      $skill2->setName('Symfony2');
      $manager->persist($skill2);


      $skill3 = new Skill();
      $skill3->setName('C++');
      $manager->persist($skill3);

      $skill4 = new Skill();
      $skill4->setName('Java');
      $manager->persist($skill4);


      $skill5 = new Skill();
      $skill5->setName('Photoshop');
      $manager->persist($skill5);

      $skill6 = new Skill();
      $skill6->setName('Blender');
      $manager->persist($skill6);


      $skill7 = new Skill();
      $skill7->setName('Bloc-note');
      $manager->persist($skill7);


      $manager->flush();

      $this->addReference('skill1',$skill1);
      $this->addReference('skill2',$skill2);
      $this->addReference('skill3',$skill3);
      $this->addReference('skill4',$skill4);
      $this->addReference('skill5',$skill5);
      $this->addReference('skill6',$skill6);
      $this->addReference('skill7',$skill7);

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
        return 3;
    }
}