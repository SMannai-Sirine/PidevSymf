<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Taxi
 *
 * @ORM\Table(name="taxi", indexes={@ORM\Index(name="fsd", columns={"id_pays"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxiRepository")
 * @UniqueEntity("matricule")
 */
class Taxi
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
     * @Assert\NotBlank
     * @ORM\Column(name="matricule", type="string", length=250, nullable=false)
     */
    private $matricule;

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
    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    /**
     * @param string $matricule
     */
    public function setMatricule(string $matricule): void
    {
        $this->matricule = $matricule;
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


}
