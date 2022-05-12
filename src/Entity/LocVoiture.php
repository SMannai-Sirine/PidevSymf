<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * LocVoiture
 * @ORM\Table(name="loc_voiture", indexes={@ORM\Index(name="fk_const_pays", columns={"id_pays"}), @ORM\Index(name="fk_const_voiture", columns={"id_voiture"})})
 * @ORM\Entity(repositoryClass="App\Repository\LocVoitureRepository")
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
     * @var DateTime
     * @Assert\GreaterThan("today")
     * @ORM\Column(name="date_res", type="date", nullable=false)
     */
    private $dateRes;

    /**
     * @var int
     * @Assert\Positive
     * @ORM\Column(name="duree_res", type="integer", nullable=false)
     */
    private $dureeRes;

    /**
     * @var bool
     * @ORM\Column(name="remise", type="boolean", nullable=false)
     */
    private $remise;

    /**
     * @var int
     * @Assert\Range(
     *      min = 1,
     *      max = 60,
     *      notInRangeMessage = "You must choose a percentage between {{ min }}% and {{ max }}% to enter",
     * )
     * @ORM\Column(name="taux_remise", type="integer", nullable=false)
     */
    private $tauxRemise;

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
     * @var Voiture
     *
     * @ORM\ManyToOne(targetEntity="Voiture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voiture", referencedColumnName="id")
     * })
     */
    private $idVoiture;

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
     * @return DateTime
     */
    public function getDateRes(): ?DateTime
    {
        return $this->dateRes;
    }

    /**
     * @param DateTime $dateRes
     */
    public function setDateRes(DateTime $dateRes): void
    {
        $this->dateRes = $dateRes;
    }

    /**
     * @return int
     */
    public function getDureeRes(): ?int
    {
        return $this->dureeRes;
    }

    /**
     * @param int $dureeRes
     */
    public function setDureeRes(int $dureeRes): void
    {
        $this->dureeRes = $dureeRes;
    }

    /**
     * @return bool
     */
    public function isRemise(): ?bool
    {
        return $this->remise;
    }

    /**
     * @param bool $remise
     */
    public function setRemise(bool $remise): void
    {
        $this->remise = $remise;
    }

    /**
     * @return int
     */
    public function getTauxRemise(): ?int
    {
        return $this->tauxRemise;
    }

    /**
     * @param int $tauxRemise
     */
    public function setTauxRemise(int $tauxRemise): void
    {
        $this->tauxRemise = $tauxRemise;
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
     * @return Voiture
     */
    public function getIdVoiture(): ?Voiture
    {
        return $this->idVoiture;
    }

    /**
     * @param Voiture $idVoiture
     */
    public function setIdVoiture(Voiture $idVoiture): void
    {
        $this->idVoiture = $idVoiture;
    }


}
