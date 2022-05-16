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
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="IdCroisiere", type="integer", nullable=false)
     */
    private $idcroisiere;


}
