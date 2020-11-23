<?php

namespace App\Repository;

use App\Entity\Offres;

class OffresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offres::class);
    }

}
