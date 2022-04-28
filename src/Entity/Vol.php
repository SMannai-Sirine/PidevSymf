<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vol
 *
 * @ORM\Table(name="vol")
 * @ORM\Entity
 */
class Vol
{
    /**
     * @var int
     *
     * @ORM\Column(name="idVol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvol;

    /**
     * @var string
     *
     * @ORM\Column(name="refAvion", type="string", length=30, nullable=false)
     */
    private $refavion;

    /**
     * @var string
     *
     * @ORM\Column(name="compagnieAerienne", type="string", length=30, nullable=false)
     */
    private $compagnieaerienne;

    /**
     * @var string
     *
     * @ORM\Column(name="aeroDepart", type="string", length=30, nullable=false)
     */
    private $aerodepart;

    /**
     * @var string
     *
     * @ORM\Column(name="aeroArrive", type="string", length=30, nullable=false)
     */
    private $aeroarrive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="date", nullable=false)
     */
    private $datedepart;

    /**
     * @var float
     *
     * @ORM\Column(name="duree", type="float", precision=10, scale=0, nullable=false)
     */
    private $duree;

    /**
     * @var int
     *
     * @ORM\Column(name="nbSieges", type="integer", nullable=false)
     */
    private $nbsieges;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    public function getIdvol(): ?int
    {
        return $this->idvol;
    }

    public function getRefavion(): ?string
    {
        return $this->refavion;
    }

    public function setRefavion(string $refavion): self
    {
        $this->refavion = $refavion;

        return $this;
    }

    public function getCompagnieaerienne(): ?string
    {
        return $this->compagnieaerienne;
    }

    public function setCompagnieaerienne(string $compagnieaerienne): self
    {
        $this->compagnieaerienne = $compagnieaerienne;

        return $this;
    }

    public function getAerodepart(): ?string
    {
        return $this->aerodepart;
    }

    public function setAerodepart(string $aerodepart): self
    {
        $this->aerodepart = $aerodepart;

        return $this;
    }

    public function getAeroarrive(): ?string
    {
        return $this->aeroarrive;
    }

    public function setAeroarrive(string $aeroarrive): self
    {
        $this->aeroarrive = $aeroarrive;

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

    public function getDuree(): ?float
    {
        return $this->duree;
    }

    public function setDuree(float $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getNbsieges(): ?int
    {
        return $this->nbsieges;
    }

    public function setNbsieges(int $nbsieges): self
    {
        $this->nbsieges = $nbsieges;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }


}
