<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadSkill.php

namespace PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PlatformBundle\Entity\AdvertSkill;


class LoadAdvertSkill extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {

      $AdvertSkill1 = new AdvertSkill();
      $AdvertSkill1->setLevel('debutant');

      $AdvertSkill1->setAdvert($this->getReference('advert1'));
      $AdvertSkill1->setSkill($this->getReference('skill1'));

      $manager->persist($AdvertSkill1);



      $AdvertSkill2 = new AdvertSkill();
      $AdvertSkill2->setLevel('debutant');
      $AdvertSkill2->setAdvert($this->getReference('advert4'));
      $AdvertSkill2->setSkill($this->getReference('skill5'));
      $manager->persist($AdvertSkill2);


     $AdvertSkill3 = new AdvertSkill();
     $AdvertSkill3->setLevel('debutant');
     $AdvertSkill3->setAdvert($this->getReference('advert6'));
     $AdvertSkill3->setSkill($this->getReference('skill3'));
     $manager->persist($AdvertSkill3);



      $AdvertSkill4 = new AdvertSkill();
      $AdvertSkill4->setLevel('confirme');
      $AdvertSkill4->setAdvert($this->getReference('advert7'));
      $AdvertSkill4->setSkill($this->getReference('skill4'));
      $manager->persist($AdvertSkill4);



      $AdvertSkill5 = new AdvertSkill();
      $AdvertSkill5->setLevel('debutant');
      $AdvertSkill5->setAdvert($this->getReference('advert1'));
      $AdvertSkill5->setSkill($this->getReference('skill6'));
      $manager->persist($AdvertSkill5);



      $AdvertSkill6 = new AdvertSkill();
      $AdvertSkill6->setLevel('debutant');
      $AdvertSkill6->setAdvert($this->getReference('advert8'));
      $AdvertSkill6->setSkill($this->getReference('skill5'));
      $manager->persist($AdvertSkill6);



      $AdvertSkill7 = new AdvertSkill();
      $AdvertSkill7->setLevel('confirme');
      $AdvertSkill7->setAdvert($this->getReference('advert8'));
      $AdvertSkill7->setSkill($this->getReference('skill7'));
      $manager->persist($AdvertSkill7);



      $manager->flush();
/*
      $this->addReference('AdvertSkill1',$AdvertSkill1);
      $this->addReference('AdvertSkill2',$AdvertSkill2);
      $this->addReference('AdvertSkill3',$AdvertSkill3);
      $this->addReference('AdvertSkill4',$AdvertSkill4);
      $this->addReference('AdvertSkill5',$AdvertSkill5);
      $this->addReference('AdvertSkill6',$AdvertSkill6);
      $this->addReference('AdvertSkill7',$AdvertSkill7);
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
        return 5;
    }
}