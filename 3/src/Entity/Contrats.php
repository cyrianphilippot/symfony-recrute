<?php

namespace App\Entity;

use App\Repository\ContratsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratsRepository::class)
 */
class Contrats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $CDI;

    /**
     * @ORM\Column(type="boolean")
     */
    private $CDD;

    /**
     * @ORM\Column(type="boolean")
     */
    private $free;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCDI(): ?bool
    {
        return $this->CDI;
    }

    public function setCDI(bool $CDI): self
    {
        $this->CDI = $CDI;

        return $this;
    }

    public function getCDD(): ?bool
    {
        return $this->CDD;
    }

    public function setCDD(bool $CDD): self
    {
        $this->CDD = $CDD;

        return $this;
    }

    public function getfree(): ?bool
    {
        return $this->free;
    }

    public function setfree(bool $free): self
    {
        $this->free = $free;

        return $this;
    }
}