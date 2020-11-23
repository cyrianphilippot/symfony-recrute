<?php

namespace App\Entity;

use App\Repository\OffresRepository;

/**
 * @ORM\Entity(repositoryClass=OffresRepository::class)
 */
class Offres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Ville;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_creation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_maj;

    /**
     * @ORM\ManyToOne(targetEntity=Contrats::class, inversedBy="offres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $key_contrats;

    /**
     * @ORM\ManyToOne(targetEntity=TypeContrats::class, inversedBy="offres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $key_type_contrats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_postal;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fin_mission;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->Date_creation;
    }

    public function setDateCreation(\DateTimeInterface $Date_creation): self
    {
        $this->Date_creation = $Date_creation;

        return $this;
    }

    public function getDateMaj(): ?\DateTimeInterface
    {
        return $this->date_maj;
    }

    public function setDateMaj(\DateTimeInterface $date_maj): self
    {
        $this->date_maj = $date_maj;

        return $this;
    }

    public function getKeyContrats(): ?Contrats
    {
        return $this->key_contrats;
    }

    public function setKeyContrats(?Contrats $key_contrats): self
    {
        $this->key_contrats = $key_contrats;

        return $this;
    }

    public function getKeyTypeContrats(): ?TypeContrats
    {
        return $this->key_type_contrats;
    }

    public function setKeyTypeContrats(?TypeContrats $key_type_contrats): self
    {
        $this->key_type_contrats = $key_type_contrats;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getFinMission(): ?\DateTimeInterface
    {
        return $this->fin_mission;
    }

    public function setFinMission(?\DateTimeInterface $fin_mission): self
    {
        $this->fin_mission = $fin_mission;

        return $this;
    }
}
