<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

/**
 * EstadoControl
 */
class EstadoControl
{
    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
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
}

