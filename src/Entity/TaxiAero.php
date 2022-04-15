<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TaxiAero
 *
 * @ORM\Table(name="taxi_aero", indexes={@ORM\Index(name="fk_pays", columns={"id_pays"}), @ORM\Index(name="fk_taxi", columns={"id_taxi"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxiAeroRepository")
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
     * @Assert\Range(
     *      min = 0,
     *      max = 23,
     *      notInRangeMessage = "You must choose a heure between 0{{ min }}:00 and {{ max }}:00 to enter",
     * )
     * @ORM\Column(name="heure", type="string", length=200, nullable=false)
     */
    private $heure;

    /**
     * @var Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pays", referencedColumnName="id")
     * })
     */
    private $idPays;

    /**
     * @var Taxi
     *
     * @ORM\ManyToOne(targetEntity="Taxi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_taxi", referencedColumnName="id")
     * })
     */
    private $idTaxi;

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
     * @return mixed
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure($heure): void
    {
        $this->heure = $heure;
    }

    /**
     * @return Pays
     */
    public function getIdPays(): ?Pays
    {
        return $this->idPays;
    }

    /**
     * @param Pays $idPays
     */
    public function setIdPays(Pays $idPays): void
    {
        $this->idPays = $idPays;
    }

    /**
     * @return Taxi
     */
    public function getIdTaxi(): ?Taxi
    {
        return $this->idTaxi;
    }

    /**
     * @param Taxi $idTaxi
     */
    public function setIdTaxi(Taxi $idTaxi): void
    {
        $this->idTaxi = $idTaxi;
    }




}
