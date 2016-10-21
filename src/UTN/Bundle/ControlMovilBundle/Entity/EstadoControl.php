<?php

namespace UTN\Bundle\ControlMovilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoControl
 *
 * @ORM\Table(name="estado_control")
 * @ORM\Entity
 */
class EstadoControl
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=40, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_estado_control", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstadoControl;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return EstadoControl
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
     * Get idEstadoControl
     *
     * @return integer
     */
    public function getIdEstadoControl()
    {
        return $this->idEstadoControl;
    }
    public function __toString()
    {
        return  (String)$this->getDescripcion() ?: "n/a";
    }
}
