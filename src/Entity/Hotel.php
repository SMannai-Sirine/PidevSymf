<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity
 */
class Hotel
{
    /**
     * @var int
     *
     * @ORM\Column(name="idhotel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhotel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_hotel", type="string", length=15, nullable=false)
     */
    private $nomHotel;

    /**
     * @var int
     *
     * @ORM\Column(name="nbetoile", type="integer", nullable=false)
     */
    private $nbetoile;

    /**
     * @var int
     *
     * @ORM\Column(name="nbchambre", type="integer", nullable=false)
     */
    private $nbchambre;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrestaurant", type="integer", nullable=false)
     */
    private $nbrestaurant;

    /**
     * @var int
     *
     * @ORM\Column(name="nbpiscine", type="integer", nullable=false)
     */
    private $nbpiscine;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_rest", type="string", length=30, nullable=false)
     */
    private $adresseRest;

    /**
     * @var string
     *
     * @ORM\Column(name="villehotel", type="string", length=30, nullable=false)
     */
    private $villehotel;


}
