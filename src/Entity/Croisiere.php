<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Croisiere
 *
 * @ORM\Table(name="croisiere")
 * @ORM\Entity
 */
class Croisiere
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCroisiere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcroisiere;

    /**
     * @var string
     *
     * @ORM\Column(name="refBateau", type="string", length=30, nullable=false)
     */
    private $refbateau;

    /**
     * @var string
     *
     * @ORM\Column(name="compagnieNavigation", type="string", length=30, nullable=false)
     */
    private $compagnienavigation;

    /**
     * @var string
     *
     * @ORM\Column(name="portDepart", type="string", length=30, nullable=false)
     */
    private $portdepart;

    /**
     * @var string
     *
     * @ORM\Column(name="portArrive", type="string", length=30, nullable=false)
     */
    private $portarrive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="date", nullable=false)
     */
    private $datedepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArrivee", type="date", nullable=false)
     */
    private $datearrivee;

    /**
     * @var int
     *
     * @ORM\Column(name="nbCabines", type="integer", nullable=false)
     */
    private $nbcabines;

    /**
     * @var float
     *
     * @ORM\Column(name="prixCroisiere", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixcroisiere;


}
