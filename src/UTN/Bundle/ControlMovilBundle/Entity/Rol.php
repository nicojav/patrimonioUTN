<?php

namespace UTN\Bundle\ControlMovilBundle\Entity;

/**
 * Rol
 */
class Rol
{
    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var boolean
     */
    private $habilitado;

    /**
     * @var integer
     */
    private $idRol;


    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Rol
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
     * Set habilitado
     *
     * @param boolean $habilitado
     *
     * @return Rol
     */
    public function setHabilitado($habilitado)
    {
        $this->habilitado = $habilitado;

        return $this;
    }

    /**
     * Get habilitado
     *
     * @return boolean
     */
    public function getHabilitado()
    {
        return $this->habilitado;
    }

    /**
     * Get idRol
     *
     * @return integer
     */
    public function getIdRol()
    {
        return $this->idRol;
    }
}

