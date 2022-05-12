<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="fk_ticket_user", columns={"id"}), @ORM\Index(name="fk_ticket_event", columns={"idEvent"})})
 * @ORM\Entity
 */
class Ticket
{
    /**
     * @var int
     *
     * @ORM\Column(name="idticket", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idticket;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_tick", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixTick;

    /**
     * @var string
     *
     * @ORM\Column(name="date_tick", type="string", length=20, nullable=false)
     */
    private $dateTick;

    /**
     * @var int
     *
     * @ORM\Column(name="idEvent", type="integer", nullable=false)
     */
    private $idevent;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;


}
