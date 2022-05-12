<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Vol
 *
 * @ORM\Table(name="vol")
 * @ORM\Entity(repositoryClass="App\Repository\VolRepository")
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
     * @Assert\NotBlank(message="Ce champ ne doit pas rester vide")
     * @Assert\Length(
     *     min=3,
     *     max=30,
     *     minMessage="La référence doit contenir au min 3 caractères",
     *     maxMessage="La référence doit contenir au max 30 caractères")
     * @ORM\Column(name="refAvion", type="string", length=30, nullable=false)
     */
    private $refavion;

    /**
     * @var string
     * @Assert\NotBlank(message="Ce champ ne doit pas rester vide")
     * @Assert\Length(
     *     min=3,
     *     max=30,
     *     minMessage="Le nom de la compagnie doit contenir au min 3 caractères",
     *     maxMessage="Le nom de la compagnie doit contenir au max 30 caractères"
     * )
     * @ORM\Column(name="compagnieAerienne", type="string", length=30, nullable=false)
     */
    private $compagnieaerienne;

    /**
     * @var string
     * @Assert\NotBlank(message="Ce champ ne doit pas rester vide")
     * @ORM\Column(name="aeroDepart", type="string", length=30, nullable=false)
     */
    private $aerodepart;

    /**
     * @var string
     * @Assert\NotBlank(message="Ce champ ne doit pas rester vide")
     * @ORM\Column(name="aeroArrive", type="string", length=30, nullable=false)
     */
    private $aeroarrive;

    /**
     * @var \DateTime
     * @Assert\GreaterThan("today",message="Veuillez entrer une date valide")
     * @Assert\NotBlank(message="Ce champ ne doit pas rester vide")
     * @ORM\Column(name="dateDepart", type="date", nullable=false)
     */
    private $datedepart;

    /**
     * @var float
     * @Assert\NotBlank(message="Ce champ ne doit pas rester vide")
     * @Assert\Positive(message="Veuillez enter une valeur positive")
     * @ORM\Column(name="duree", type="float", precision=10, scale=0, nullable=false)
     */
    private $duree;

    /**
     * @var int
     * @Assert\NotBlank(message="Ce champ ne doit pas rester vide")
     * @Assert\Positive(message="Veuillez enter une valeur positive")
     * @ORM\Column(name="nbSieges", type="integer", nullable=false)
     */
    private $nbsieges;

    /**
     * @var float
     * @Assert\NotBlank(message="Ce champ ne doit pas rester vide")
     * @Assert\Positive(message="Veuillez enter une valeur positive")
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;
    private $isReserved;

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

    /**
     * @return mixed
     */
    public function getIsReserved()
    {
        return $this->isReserved;
    }

    /**
     * @param mixed $isReserved
     */
    public function setIsReserved($isReserved): void
    {
        $this->isReserved = $isReserved;
    }


}
