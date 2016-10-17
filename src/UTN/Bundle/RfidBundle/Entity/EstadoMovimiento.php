<?php

namespace UTN\Bundle\RfidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoMovimiento
 *
 * @ORM\Table(name="estado_movimiento", indexes={@ORM\Index(name="IDX_5A238DEC52171949", columns={"id_estado_movimiento"})})
 * @ORM\Entity
 */
class EstadoMovimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_estado_movimiento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstadoMovimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=1000, nullable=true)
     */
    private $descripcion;

    /**
     * Get idEstadoMovimiento
     *
     * @return integer
     */
    public function getIdEstadoMovimiento()
    {
        return $this->idEstadoMovimiento;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return EstadoMovimiento
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

    public function __toString()
    {
        return  (String)$this->getDescripcion() ?: "n/a";
    }


}
