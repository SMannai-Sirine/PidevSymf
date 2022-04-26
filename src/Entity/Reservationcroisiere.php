<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservationcroisiere
 *
 * @ORM\Table(name="reservationcroisiere")
 * @ORM\Entity
 */
class Reservationcroisiere
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdReservationCroisiere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreservationcroisiere;

    /**
     * @var int
     *
     * @ORM\Column(name="idU", type="integer", nullable=false)
     */
    private $idu;

    /**
     * @var int
     *
     * @ORM\Column(name="IdCroisiere", type="integer", nullable=false)
     */
    private $idcroisiere;

    public function getIdreservationcroisiere(): ?int
    {
        return $this->idreservationcroisiere;
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

    public function getIdcroisiere(): ?int
    {
        return $this->idcroisiere;
    }

    public function setIdcroisiere(int $idcroisiere): self
    {
        $this->idcroisiere = $idcroisiere;

        return $this;
    }


}
