<?php
/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 24/05/17
 * Time: 09:41
 */

namespace PlatformBundle\DataFixtures\ORM;


use PlatformBundle\Entity\Image;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadImage extends AbstractFixture implements OrderedFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        /*
        $media1 = new Image();
        $media1->setAlt('Job de rêve');
        $media1->setUrl('http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg');
        $manager->persist($media1);

        $media2 = new Image();
        $media2->setAlt('Job de rêve');
        $media2->setUrl('http://www.by.all.biz/img/by/catalog/96389.png');
        $manager->persist($media2);

        $media3 = new Image();
        $media3->setAlt('carottes');
        $media3->setUrl('http://www.iltuoallenamento.it/wp-content/uploads/2013/04/carote.png');
        $manager->persist($media3);

        $media4 = new Image();
        $media4->setAlt('banane');
        $media4->setUrl('http://www.hindimeaning.com/pictures/fruits/banana.jpg');
        $manager->persist($media4);

        $media5 = new Image();
        $media5->setAlt('frais');
        $media5->setUrl('http://flowerstore.gr/image/cache/catalog/fraoela-sporoi-0-15gr-156-630x552.jpg');
        $manager->persist($media5);

        $media6 = new Image();
        $media6->setAlt('pomme');
        $media6->setUrl('http://www.womenshealthmag.com/sites/womenshealthmag.com/files/2015/08/04/shutterstock_127612211_0_0.jpg');
        $manager->persist($media6);


        $media7 = new Image();
        $media7->setAlt('orange');
        $media7->setUrl(' http://www.westernwholesalers.com.au/images/products/ip005975.jpg');
        $manager->persist($media7);

        $manager->flush();




        $media8 = new Image();
        $media8->setAlt('photo');
        $media8->setUrl(' http://www.westernwholesalers.com.au/images/products/ip005975.jpg');
        $manager->persist($media8);

        $manager->flush();

        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);
        $this->addReference('media8', $media8);

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
        return 1;
    }
}