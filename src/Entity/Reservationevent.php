<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservationevent
 *
 * @ORM\Table(name="reservationevent", indexes={@ORM\Index(name="fk_idEvent", columns={"idEvent"}), @ORM\Index(name="fk_id", columns={"id"})})
 * @ORM\Entity
 */
class Reservationevent
{
    /**
     * @var int
     *
     * @ORM\Column(name="ide", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ide;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateevent", type="date", nullable=false)
     */
    private $dateevent;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEvent", referencedColumnName="IdEvent")
     * })
     */
    private $idevent;


}
