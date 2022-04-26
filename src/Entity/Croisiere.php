<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Croisiere
 *
 * @ORM\Table(name="croisiere")
 * @ORM\Entity
 */
class Croisiere
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCroisiere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcroisiere;

    /**
     * @var string
     *
     * @ORM\Column(name="refBateau", type="string", length=30, nullable=false)
     */
    private $refbateau;

    /**
     * @var string
     *
     * @ORM\Column(name="compagnieNavigation", type="string", length=30, nullable=false)
     */
    private $compagnienavigation;

    /**
     * @var string
     *
     * @ORM\Column(name="portDepart", type="string", length=30, nullable=false)
     */
    private $portdepart;

    /**
     * @var string
     *
     * @ORM\Column(name="portArrive", type="string", length=30, nullable=false)
     */
    private $portarrive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="date", nullable=false)
     */
    private $datedepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArrivee", type="date", nullable=false)
     */
    private $datearrivee;

    /**
     * @var int
     *
     * @ORM\Column(name="nbCabines", type="integer", nullable=false)
     */
    private $nbcabines;

    /**
     * @var float
     *
     * @ORM\Column(name="prixCroisiere", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixcroisiere;

    public function getIdcroisiere(): ?int
    {
        return $this->idcroisiere;
    }

    public function getRefbateau(): ?string
    {
        return $this->refbateau;
    }

    public function setRefbateau(string $refbateau): self
    {
        $this->refbateau = $refbateau;

        return $this;
    }

    public function getCompagnienavigation(): ?string
    {
        return $this->compagnienavigation;
    }

    public function setCompagnienavigation(string $compagnienavigation): self
    {
        $this->compagnienavigation = $compagnienavigation;

        return $this;
    }

    public function getPortdepart(): ?string
    {
        return $this->portdepart;
    }

    public function setPortdepart(string $portdepart): self
    {
        $this->portdepart = $portdepart;

        return $this;
    }

    public function getPortarrive(): ?string
    {
        return $this->portarrive;
    }

    public function setPortarrive(string $portarrive): self
    {
        $this->portarrive = $portarrive;

        return $this;
    }

    public function getDatedepart(): ?\DateTimeInterface
    {
        return $this->datedepart;
    }

    public function setDatedepart(\DateTimeInterface $datedepart): self
    {
        $this->datedepart = $datedepart;

        return $this;
    }

    public function getDatearrivee(): ?\DateTimeInterface
    {
        return $this->datearrivee;
    }

    public function setDatearrivee(\DateTimeInterface $datearrivee): self
    {
        $this->datearrivee = $datearrivee;

        return $this;
    }

    public function getNbcabines(): ?int
    {
        return $this->nbcabines;
    }

    public function setNbcabines(int $nbcabines): self
    {
        $this->nbcabines = $nbcabines;

        return $this;
    }

    public function getPrixcroisiere(): ?float
    {
        return $this->prixcroisiere;
    }

    public function setPrixcroisiere(float $prixcroisiere): self
    {
        $this->prixcroisiere = $prixcroisiere;

        return $this;
    }


}
