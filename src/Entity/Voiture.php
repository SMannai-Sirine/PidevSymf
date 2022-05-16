<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use JsonSerializable;

/**
 * Voiture
 * @ORM\Table(name="voiture", indexes={@ORM\Index(name="sqdf", columns={"id_pays"})})
 * @ORM\Entity(repositoryClass="App\Repository\VoitureRepository")
 */
class Voiture implements JsonSerializable
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
     * @ORM\Column(name="model", type="string", length=100, nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100, nullable=false)
     */
    private $type;

    /**
     * @var float
     * @Assert\Positive
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \App\Entity\Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pays", referencedColumnName="id")
     * })
     */
    private $idPays;

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
     * @return string
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getPrix(): ?float
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
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

    public function jsonSerialize(): array
    {
        return array(
            'id' => $this->id,
            'pays' => $this->idPays,
            'model' => $this->model,
            'type' => $this->type,
            'prix' => $this->prix

        );
    }

    public function setUp($pays, $model, $type, $prix)
    {
        $this->idPays = $pays;
        $this->model = $model;
        $this->type = $type;
        $this->prix = $prix;

    }
}
