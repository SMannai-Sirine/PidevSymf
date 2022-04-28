<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity
 */
class Hotel
{
    /**
     * @var int
     *
     * @ORM\Column(name="idhotel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhotel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_hotel", type="string", length=15, nullable=false)
     */
    private $nomHotel;

    /**
     * @var int
     *
     * @ORM\Column(name="nbetoile", type="integer", nullable=false)
     */
    private $nbetoile;

    /**
     * @var int
     *
     * @ORM\Column(name="nbchambre", type="integer", nullable=false)
     */
    private $nbchambre;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrestaurant", type="integer", nullable=false)
     */
    private $nbrestaurant;

    /**
     * @var int
     *
     * @ORM\Column(name="nbpiscine", type="integer", nullable=false)
     */
    private $nbpiscine;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_rest", type="string", length=30, nullable=false)
     */
    private $adresseRest;

    /**
     * @var string
     *
     * @ORM\Column(name="villehotel", type="string", length=30, nullable=false)
     */
    private $villehotel;

    public function getIdhotel(): ?int
    {
        return $this->idhotel;
    }

    public function getNomHotel(): ?string
    {
        return $this->nomHotel;
    }

    public function setNomHotel(string $nomHotel): self
    {
        $this->nomHotel = $nomHotel;

        return $this;
    }

    public function getNbetoile(): ?int
    {
        return $this->nbetoile;
    }

    public function setNbetoile(int $nbetoile): self
    {
        $this->nbetoile = $nbetoile;

        return $this;
    }

    public function getNbchambre(): ?int
    {
        return $this->nbchambre;
    }

    public function setNbchambre(int $nbchambre): self
    {
        $this->nbchambre = $nbchambre;

        return $this;
    }

    public function getNbrestaurant(): ?int
    {
        return $this->nbrestaurant;
    }

    public function setNbrestaurant(int $nbrestaurant): self
    {
        $this->nbrestaurant = $nbrestaurant;

        return $this;
    }

    public function getNbpiscine(): ?int
    {
        return $this->nbpiscine;
    }

    public function setNbpiscine(int $nbpiscine): self
    {
        $this->nbpiscine = $nbpiscine;

        return $this;
    }

    public function getAdresseRest(): ?string
    {
        return $this->adresseRest;
    }

    public function setAdresseRest(string $adresseRest): self
    {
        $this->adresseRest = $adresseRest;

        return $this;
    }

    public function getVillehotel(): ?string
    {
        return $this->villehotel;
    }

    public function setVillehotel(string $villehotel): self
    {
        $this->villehotel = $villehotel;

        return $this;
    }


}
