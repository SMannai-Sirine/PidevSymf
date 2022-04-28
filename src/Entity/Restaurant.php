<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurant
 *
 * @ORM\Table(name="restaurant")
 * @ORM\Entity
 */
class Restaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_rest", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRest;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_rest", type="string", length=15, nullable=false)
     */
    private $nomRest;

    /**
     * @var int
     *
     * @ORM\Column(name="numtel_rest", type="bigint", nullable=false)
     */
    private $numtelRest;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_rest", type="string", length=30, nullable=false)
     */
    private $adresseRest;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_rest", type="string", length=15, nullable=false)
     */
    private $villeRest;

    /**
     * @var int
     *
     * @ORM\Column(name="nbtable_rest", type="integer", nullable=false)
     */
    private $nbtableRest;

    /**
     * @var string
     *
     * @ORM\Column(name="type_rest", type="string", length=15, nullable=false)
     */
    private $typeRest;

    public function getIdRest(): ?int
    {
        return $this->idRest;
    }

    public function getNomRest(): ?string
    {
        return $this->nomRest;
    }

    public function setNomRest(string $nomRest): self
    {
        $this->nomRest = $nomRest;

        return $this;
    }

    public function getNumtelRest(): ?string
    {
        return $this->numtelRest;
    }

    public function setNumtelRest(string $numtelRest): self
    {
        $this->numtelRest = $numtelRest;

        return $this;
    }

    public function getAdresseRest(): ?string
    {
        return $this->adresseRest;
    }

    public function setAdresseRest(string $adresseRest): self
    {
        $this->adresseRest = $adresseRest;

        return $this;
    }

    public function getVilleRest(): ?string
    {
        return $this->villeRest;
    }

    public function setVilleRest(string $villeRest): self
    {
        $this->villeRest = $villeRest;

        return $this;
    }

    public function getNbtableRest(): ?int
    {
        return $this->nbtableRest;
    }

    public function setNbtableRest(int $nbtableRest): self
    {
        $this->nbtableRest = $nbtableRest;

        return $this;
    }

    public function getTypeRest(): ?string
    {
        return $this->typeRest;
    }

    public function setTypeRest(string $typeRest): self
    {
        $this->typeRest = $typeRest;

        return $this;
    }


}
