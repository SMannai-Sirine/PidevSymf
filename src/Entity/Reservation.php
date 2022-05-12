<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \Hotel
     *
     * @ORM\ManyToOne(targetEntity="Hotel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idhotel", referencedColumnName="id")
     * })
     */
    private $idhotel;
    



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomreservation;

    /**
     * @ORM\Column(type="integer")
     */
    private $chambreres;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomreservation(): ?string
    {
        return $this->nomreservation;
    }

    public function setNomreservation(string $nomreservation): self
    {
        $this->nomreservation = $nomreservation;

        return $this;
    }

    public function getChambreres(): ?int
    {
        return $this->chambreres;
    }

    public function setChambreres(int $chambreres): self
    {
        $this->chambreres = $chambreres;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
    public function getIdhotel(): ?Hotel
    {
        return $this->idhotel;
    }

    public function setIdhotel(?Hotel $idhotel): self
    {
        $this->idhotel = $idhotel;

        return $this;
    }
   
}
