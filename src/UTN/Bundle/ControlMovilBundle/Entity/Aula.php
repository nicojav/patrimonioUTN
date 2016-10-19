<?php

namespace UTN\Bundle\ControlMovilBundle\Entity;

/**
 * Aula
 */
class Aula
{
    /**
     * @var string
     */
    private $codAula;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
     */
    private $idAula;

    /**
     * @var \UTN\Bundle\ControlMovilBundle\Entity\Sede
     */
    private $idSede;


    /**
     * Set codAula
     *
     * @param string $codAula
     *
     * @return Aula
     */
    public function setCodAula($codAula)
    {
        $this->codAula = $codAula;

        return $this;
    }

    /**
     * Get codAula
     *
     * @return string
     */
    public function getCodAula()
    {
        return $this->codAula;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Aula
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
     * Get idAula
     *
     * @return integer
     */
    public function getIdAula()
    {
        return $this->idAula;
    }

    /**
     * Set idSede
     *
     * @param \UTN\Bundle\ControlMovilBundle\Entity\Sede $idSede
     *
     * @return Aula
     */
    public function setIdSede(\UTN\Bundle\ControlMovilBundle\Entity\Sede $idSede = null)
    {
        $this->idSede = $idSede;

        return $this;
    }

    /**
     * Get idSede
     *
     * @return \UTN\Bundle\ControlMovilBundle\Entity\Sede
     */
    public function getIdSede()
    {
        return $this->idSede;
    }
}

