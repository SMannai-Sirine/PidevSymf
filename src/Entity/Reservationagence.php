<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservationagence
 *
 * @ORM\Table(name="reservationagence", indexes={@ORM\Index(name="fk_res_agence", columns={"idU"})})
 * @ORM\Entity
 */
class Reservationagence
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reservation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_hotel_rest", type="string", length=30, nullable=false)
     */
    private $nomHotelRest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reservation", type="date", nullable=false)
     */
    private $dateReservation;

    /**
     * @var int
     *
     * @ORM\Column(name="id_hotel_rest", type="integer", nullable=false)
     */
    private $idHotelRest;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idU", referencedColumnName="idU")
     * })
     */
    private $idu;

    public function getIdReservation(): ?int
    {
        return $this->idReservation;
    }

    public function getNomHotelRest(): ?string
    {
        return $this->nomHotelRest;
    }

    public function setNomHotelRest(string $nomHotelRest): self
    {
        $this->nomHotelRest = $nomHotelRest;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getIdHotelRest(): ?int
    {
        return $this->idHotelRest;
    }

    public function setIdHotelRest(int $idHotelRest): self
    {
        $this->idHotelRest = $idHotelRest;

        return $this;
    }

    public function getIdu(): ?Utilisateur
    {
        return $this->idu;
    }

    public function setIdu(?Utilisateur $idu): self
    {
        $this->idu = $idu;

        return $this;
    }


}
