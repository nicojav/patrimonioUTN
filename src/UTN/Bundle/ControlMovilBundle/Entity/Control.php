<?php

namespace UTN\Bundle\ControlMovilBundle\Entity;

/**
 * Control
 */
class Control
{
    /**
     * @var string
     */
    private $xml;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $codFecha;

    /**
     * @var string
     */
    private $codAula;

    /**
     * @var string
     */
    private $codUsuario;

    /**
     * @var \DateTime
     */
    private $fechaCorrida;

    /**
     * @var integer
     */
    private $idControl;

    /**
     * @var \UTN\Bundle\ControlMovilBundle\Entity\EstadoControl
     */
    private $idEstadoControl;

    /**
     * @var \UTN\Bundle\ControlMovilBundle\Entity\Aula
     */
    private $idAula;

    /**
     * @var \UTN\Bundle\ControlMovilBundle\Entity\Usuario
     */
    private $idUsuario;


    /**
     * Set xml
     *
     * @param string $xml
     *
     * @return Control
     */
    public function setXml($xml)
    {
        $this->xml = $xml;

        return $this;
    }

    /**
     * Get xml
     *
     * @return string
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Control
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set codFecha
     *
     * @param string $codFecha
     *
     * @return Control
     */
    public function setCodFecha($codFecha)
    {
        $this->codFecha = $codFecha;

        return $this;
    }

    /**
     * Get codFecha
     *
     * @return string
     */
    public function getCodFecha()
    {
        return $this->codFecha;
    }

    /**
     * Set codAula
     *
     * @param string $codAula
     *
     * @return Control
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
     * Set codUsuario
     *
     * @param string $codUsuario
     *
     * @return Control
     */
    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;

        return $this;
    }

    /**
     * Get codUsuario
     *
     * @return string
     */
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }

    /**
     * Set fechaCorrida
     *
     * @param \DateTime $fechaCorrida
     *
     * @return Control
     */
    public function setFechaCorrida($fechaCorrida)
    {
        $this->fechaCorrida = $fechaCorrida;

        return $this;
    }

    /**
     * Get fechaCorrida
     *
     * @return \DateTime
     */
    public function getFechaCorrida()
    {
        return $this->fechaCorrida;
    }

    /**
     * Get idControl
     *
     * @return integer
     */
    public function getIdControl()
    {
        return $this->idControl;
    }

    /**
     * Set idEstadoControl
     *
     * @param \UTN\Bundle\ControlMovilBundle\Entity\EstadoControl $idEstadoControl
     *
     * @return Control
     */
    public function setIdEstadoControl(\UTN\Bundle\ControlMovilBundle\Entity\EstadoControl $idEstadoControl = null)
    {
        $this->idEstadoControl = $idEstadoControl;

        return $this;
    }

    /**
     * Get idEstadoControl
     *
     * @return \UTN\Bundle\ControlMovilBundle\Entity\EstadoControl
     */
    public function getIdEstadoControl()
    {
        return $this->idEstadoControl;
    }

    /**
     * Set idAula
     *
     * @param \UTN\Bundle\ControlMovilBundle\Entity\Aula $idAula
     *
     * @return Control
     */
    public function setIdAula(\UTN\Bundle\ControlMovilBundle\Entity\Aula $idAula = null)
    {
        $this->idAula = $idAula;

        return $this;
    }

    /**
     * Get idAula
     *
     * @return \UTN\Bundle\ControlMovilBundle\Entity\Aula
     */
    public function getIdAula()
    {
        return $this->idAula;
    }

    /**
     * Set idUsuario
     *
     * @param \UTN\Bundle\ControlMovilBundle\Entity\Usuario $idUsuario
     *
     * @return Control
     */
    public function setIdUsuario(\UTN\Bundle\ControlMovilBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \UTN\Bundle\ControlMovilBundle\Entity\Usuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}

