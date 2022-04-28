<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="fk_ticket_user", columns={"idU"}), @ORM\Index(name="fk_ticket_event", columns={"idEvent"})})
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
     * @ORM\Column(name="idU", type="integer", nullable=false)
     */
    private $idu;

    public function getIdticket(): ?int
    {
        return $this->idticket;
    }

    public function getPrixTick(): ?float
    {
        return $this->prixTick;
    }

    public function setPrixTick(float $prixTick): self
    {
        $this->prixTick = $prixTick;

        return $this;
    }

    public function getDateTick(): ?string
    {
        return $this->dateTick;
    }

    public function setDateTick(string $dateTick): self
    {
        $this->dateTick = $dateTick;

        return $this;
    }

    public function getIdevent(): ?int
    {
        return $this->idevent;
    }

    public function setIdevent(int $idevent): self
    {
        $this->idevent = $idevent;

        return $this;
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


}
