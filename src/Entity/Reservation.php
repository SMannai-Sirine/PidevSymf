<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Reservation
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation implements JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_res", type="integer", nullable=false)
     */
    private $idRes;

    /**
     * @var bool
     *
     * @ORM\Column(name="type", type="boolean", nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=250, nullable=false)
     */
    private $etat;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdRes(): ?int
    {
        return $this->idRes;
    }

    /**
     * @param int $idRes
     */
    public function setIdRes(int $idRes): void
    {
        $this->idRes = $idRes;
    }

    /**
     * @return bool
     */
    public function isType(): ?bool
    {
        return $this->type;
    }

    /**
     * @param bool $type
     */
    public function setType(bool $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getEtat(): ?string
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat(string $etat): void
    {
        $this->etat = $etat;
    }

    public function jsonSerialize(): array
    {
        return array(
            'id' => $this->id,
            'idRes' => $this->idRes,
            'type' => $this->type ? 1 : 0,
            'etat' => $this->etat

        );
    }

    public function setUp($idRes, $type, $etat)
    {
        $this->idRes = $idRes;
        $this->type = $type;
        $this->etat = $etat;

    }

}
