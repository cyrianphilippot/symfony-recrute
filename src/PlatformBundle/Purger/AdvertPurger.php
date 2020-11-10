<?php
// src/PlatformBundle/Purger/AdvertPurger.php

namespace PlatformBundle\Purger;

use Doctrine\ORM\EntityManagerInterface;

class AdvertPurger
{
  /**
   * @var EntityManagerInterface
   */
  private $em;

  // On injecte l'EntityManager
  public function __construct(EntityManagerInterface $em)
  {
    $this->em = $em;
  }

  public function purge($days)
  {
    $advertRepository      = $this->em->getRepository('PlatformBundle:Advert');
    $advertSkillRepository = $this->em->getRepository('PlatformBundle:AdvertSkill');


    // date d'il y a $days jours
    $date = new \Datetime($days.' days ago');

    // On récupère les annonces à supprimer
    $listAdverts = $advertRepository->getAdvertsBefore($date);

      //Juste pour afficher un petit texte FlashBag
      $texte_retourne = "( ".count($listAdverts)." Annonces supprimées ) ";
      $texte_retourne .= "---------";
    // On parcourt les annonces pour les supprimer effectivement
    foreach ($listAdverts as $advert) {
      // On récupère les AdvertSkill liées à cette annonce
      $advertSkills = $advertSkillRepository->findBy(array('advert' => $advert));

        $texte_retourne .= " | ".$advert->getTitle();

      // Pour les supprimer toutes avant de pouvoir supprimer l'annonce elle-même
      foreach ($advertSkills as $advertSkill) {
        $this->em->remove($advertSkill);
      }

      // On peut maintenant supprimer l'annonce
      $this->em->remove($advert);
    }

    $texte_retourne .= "   |--------- ";
    // Et on n'oublie pas de faire un flush !
    $this->em->flush();

      //on retourne le joli texte
      return $texte_retourne;
  }
}
