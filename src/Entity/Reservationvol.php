<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Endroid\QrCode\Builder\BuilderInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Reservationvol
 *
 * @ORM\Table(name="reservationvol", indexes={@ORM\Index(name="fk_reservationVol_utilisateur", columns={"idU"}), @ORM\Index(name="fk_reservationVol_vol", columns={"idVol"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReservationVolRepository")
 */
class Reservationvol
{
    /**
     * @var int
     *
     * @ORM\Column(name="idReservationVol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("post:read")
     */
    private $idreservationvol;

    /**
     * @var int
     *
     * @ORM\Column(name="idU", type="integer", nullable=false)
     * @Groups("post:read")
     */
    private $idu;

    /**
     * @var int
     *
     * @ORM\Column(name="idVol", type="integer", nullable=false)
     * @Groups("post:read")
     */
    private $idvol;
    private $vol;
    private $user;
    private $qrcode;



    public function getIdreservationvol(): ?int
    {
        return $this->idreservationvol;
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

    public function getIdvol(): ?int
    {
        return $this->idvol;
    }

    public function setIdvol(int $idvol): self
    {
        $this->idvol = $idvol;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVol()
    {
        return $this->vol;
    }

    /**
     * @param mixed $vol
     */
    public function setVol($vol): void
    {
        $this->vol = $vol;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getQrcode()
    {
        return $this->qrcode;
    }

    /**
     * @param mixed $qrcode
     */
    public function setQrcode($qrcode): void
    {
        $this->qrcode = $qrcode;
    }






}
