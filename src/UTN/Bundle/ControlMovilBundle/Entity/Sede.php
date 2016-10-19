<?php

namespace UTN\Bundle\ControlMovilBundle\Entity;

/**
 * Sede
 */
class Sede
{
    /**
     * @var integer
     */
    private $codSede;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
     */
    private $idSede;


    /**
     * Set codSede
     *
     * @param integer $codSede
     *
     * @return Sede
     */
    public function setCodSede($codSede)
    {
        $this->codSede = $codSede;

        return $this;
    }

    /**
     * Get codSede
     *
     * @return integer
     */
    public function getCodSede()
    {
        return $this->codSede;
    }

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
}

