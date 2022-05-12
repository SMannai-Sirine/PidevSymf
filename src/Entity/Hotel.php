<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=HotelRepository::class)
 */
class Hotel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

       /**
        * @Assert\NotBlank(message="Le champs nom est obligatoire * ")
     * @Assert\Length( min = 3, max = 20, minMessage = "Merci de Vérifier le nom")

     * @ORM\Column(type="string", length=15)
     */
    private $nom_hotel;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbetoile;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbchambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrestaurant;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbpiscine;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $adresse_hotel;

    /**
     * @Assert\Length( min = 3, max = 20, minMessage = "Merci de Vérifier la ville")
    
     * @ORM\Column(type="string", length=30)
     */
    private $villehotel;

    /**
     
     * @ORM\Column(type="string", length=255)
     */
    private $image;



    public function getId(): ?int
    {
        return $this->id;
    }



    public function getNomHotel(): ?string
    {
        return $this->nom_hotel;
    }

    public function setNomHotel(string $nom_hotel): self
    {
        $this->nom_hotel = $nom_hotel;

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

    public function getAdresseHotel(): ?string
    {
        return $this->adresse_hotel;
    }

    public function setAdresseHotel(string $adresse_hotel): self
    {
        $this->adresse_hotel = $adresse_hotel;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function  __toString(): ?string
    {
        return $this->id;
        }


}
