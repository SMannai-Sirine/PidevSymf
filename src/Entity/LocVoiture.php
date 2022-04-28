<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocVoiture
 *
 * @ORM\Table(name="loc_voiture", indexes={@ORM\Index(name="fk_const_voiture", columns={"id_voiture"}), @ORM\Index(name="fk_const_pays", columns={"id_pays"})})
 * @ORM\Entity
 */
class LocVoiture
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_res", type="date", nullable=false)
     */
    private $dateRes;

    /**
     * @var int
     *
     * @ORM\Column(name="duree_res", type="integer", nullable=false)
     */
    private $dureeRes;

    /**
     * @var bool
     *
     * @ORM\Column(name="remise", type="boolean", nullable=false)
     */
    private $remise;

    /**
     * @var int
     *
     * @ORM\Column(name="taux_remise", type="integer", nullable=false)
     */
    private $tauxRemise;

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
     * @var \Voiture
     *
     * @ORM\ManyToOne(targetEntity="Voiture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voiture", referencedColumnName="id")
     * })
     */
    private $idVoiture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRes(): ?\DateTimeInterface
    {
        return $this->dateRes;
    }

    public function setDateRes(\DateTimeInterface $dateRes): self
    {
        $this->dateRes = $dateRes;

        return $this;
    }

    public function getDureeRes(): ?int
    {
        return $this->dureeRes;
    }

    public function setDureeRes(int $dureeRes): self
    {
        $this->dureeRes = $dureeRes;

        return $this;
    }

    public function getRemise(): ?bool
    {
        return $this->remise;
    }

    public function setRemise(bool $remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getTauxRemise(): ?int
    {
        return $this->tauxRemise;
    }

    public function setTauxRemise(int $tauxRemise): self
    {
        $this->tauxRemise = $tauxRemise;

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

    public function getIdVoiture(): ?Voiture
    {
        return $this->idVoiture;
    }

    public function setIdVoiture(?Voiture $idVoiture): self
    {
        $this->idVoiture = $idVoiture;

        return $this;
    }


}
