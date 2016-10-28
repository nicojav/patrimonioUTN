<?php

namespace UTN\Bundle\DashboardMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sede
 *
 * @ORM\Table(name="sede")
 * @ORM\Entity
 */
class Sede
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sede", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSede;

    /**
     * @var integer
     *
     * @ORM\Column(name="cod_sede", type="smallint", nullable=true)
     */
    private $codSede;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=false)
     */
    private $descripcion;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Sede
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get idSede
     *
     * @return integer
     */
    public function getIdSede()
    {
        return $this->idSede;
    }

    public function __toString()
    {
        return  $this->getDescripcion() ?: "n/a";
    }
}
