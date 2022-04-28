<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaxiAero
 *
 * @ORM\Table(name="taxi_aero", indexes={@ORM\Index(name="fk_taxi", columns={"id_taxi"}), @ORM\Index(name="fk_pays", columns={"id_pays"})})
 * @ORM\Entity
 */
class TaxiAero
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
     * @var string
     *
     * @ORM\Column(name="heure", type="string", length=200, nullable=false)
     */
    private $heure;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pays", referencedColumnName="id")
     * })
     */
    private $idPays;

    /**
     * @var \Taxi
     *
     * @ORM\ManyToOne(targetEntity="Taxi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_taxi", referencedColumnName="id")
     * })
     */
    private $idTaxi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getIdPays(): ?Pays
    {
        return $this->idPays;
    }

    public function setIdPays(?Pays $idPays): self
    {
        $this->idPays = $idPays;

        return $this;
    }

    public function getIdTaxi(): ?Taxi
    {
        return $this->idTaxi;
    }

    public function setIdTaxi(?Taxi $idTaxi): self
    {
        $this->idTaxi = $idTaxi;

        return $this;
    }


}
