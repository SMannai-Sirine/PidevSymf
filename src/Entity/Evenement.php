<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass=App\Repository\EvenementRepository::class)

 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdEvent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("evenement")
     * @Groups("posts:read")
     */
    public $idevent;

    /**
     *@Assert\NotBlank(message=" intitulé doit être non vide")
     *@Assert\Length(
     * min=5,
     * minMessage="Entrer un intitulé au minimum de 5 caractéres"
     * )
     * @ORM\Column( type="string", length=20)
     * @Groups("evenement")
     * @Groups("posts:read")
     */
    public $intitule;

    /**
     *@Assert\NotBlank(message=" Pays doit être non vide")
     *@Assert\Length(
     * min=3,
     * minMessage="Entrer un pays au minimum de 3 caractéres"
     * )
     *
     * @ORM\Column(name="paysEvent", type="string", length=20, nullable=false)
     * @Groups("evenement")
     * @Groups("posts:read")
     */
    public $paysevent;

    /**
     *@Assert\NotBlank(message=" Adresse doit être non vide")
     *@Assert\Length(
     * min=5,
     * minMessage="Entrer un adresse au minimum de 5 caractéres"
     * )
     *
     * @ORM\Column(name="adresse", type="string", length=20, nullable=false)
     * @Groups("evenement")
     * @Groups("posts:read")
     */
    public $adresse;

    /**
     * @Assert\NotBlank(message=" Date doit supérieur au date actuelle")
     * @Assert\GreaterThan("today")
     * @ORM\Column(name="dateEvent", type="date", nullable=false)
     * @Groups("evenement")
     * @Groups("posts:read")
     */
    public $dateevent;

    /**
     *@Assert\NotBlank(message=" Adresse doit être non vide")
     * @ORM\Column(name="typeEvent", type="string", length=255, nullable=false)
     * @Groups("evenement")
     * @Groups("posts:read")
     */
    public $typeevent;

    /**
     *@Assert\NotBlank(message=" Choisir une image")
     *@Assert\File(mimeTypes={"image/png" , "image/jpeg"})
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $photo;

    /**
     *@Assert\NotBlank(message=" Prix doit être non vide")
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     * @Groups("evenement")
     * @Groups("posts:read")
     */
    public $prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $latitude;

    /**
     * @return mixed
     */
    public function getidevent()
    {
        return $this->idevent;
    }


    public function getintitule(): ?string
    {
        return $this->intitule;
    }

    public function getpaysevent(): ?string
    {
        return $this->paysevent;
    }

    public function getadresse(): ?string
    {
        return $this->adresse;
    }

    public function getdateevent()
    {
        return $this->dateevent;
    }


    public function gettypeevent(): ?string
    {
        return $this->typeevent;
    }

    public function getphoto()
    {
        return $this->photo;
    }

    public function getprix(): ?float
    {
        return $this->prix;
    }

    public function setAdresse(string $adresse): self {
        $this->adresse=$adresse;
        return $this;
    }


    public function setPaysevent(string $paysevent): self {
        $this->paysevent=$paysevent;
        return $this;
    }

    public function setTypesevent(string $typeevent): self {
        $this->typeevent=$typeevent;
        return $this;
    }

    public function setPhoto($photo)
    {
        $this->photo=$photo;
        return $this;
    }


    public function setDateevent( $dateevent): void {
        $this->dateevent=$dateevent;

    }

    public function setPrix( float $prix): self {
        $this->prix=$prix;
        return $this;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function setTypeevent(string $typeevent): self
    {
        $this->typeevent = $typeevent;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }











}