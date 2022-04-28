<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservationvol
 *
 * @ORM\Table(name="reservationvol")
 * @ORM\Entity
 */
class Reservationvol
{
    /**
     * @var int
     *
     * @ORM\Column(name="idReservationVol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreservationvol;

    /**
     * @var int
     *
     * @ORM\Column(name="idU", type="integer", nullable=false)
     */
    private $idu;

    /**
     * @var int
     *
     * @ORM\Column(name="idVol", type="integer", nullable=false)
     */
    private $idvol;

    public function getIdreservationvol(): ?int
    {
        return $this->idreservationvol;
    }

    public function getIdu(): ?int
    {
        return $this->idu;
    }

    public function setIdu(int $idu): self
    {
        $this->idu = $idu;

        return $this;
    }

    public function getIdvol(): ?int
    {
        return $this->idvol;
    }

    public function setIdvol(int $idvol): self
    {
        $this->idvol = $idvol;

        return $this;
    }


}
