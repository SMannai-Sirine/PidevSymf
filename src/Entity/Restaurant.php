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


}
