<?php

namespace UTN\Bundle\ControlMovilBundle\Entity;

/**
 * ControlInventario
 */
class ControlInventario
{
    /**
     * @var string
     */
    private $codInventario;

    /**
     * @var integer
     */
    private $idControlInventario;

    /**
     * @var \UTN\Bundle\ControlMovilBundle\Entity\Control
     */
    private $idControl;

    /**
     * @var \UTN\Bundle\ControlMovilBundle\Entity\EstadoControl
     */
    private $idEstadoControl;



    /**
     * @var \UTN\Bundle\DashboardMainBundle\Entity\Inventario
     */
    private $idInventario;


    /**
     * Set codInventario
     *
     * @param string $codInventario
     *
     * @return ControlInventario
     */
    public function setCodInventario($codInventario)
    {
        $this->codInventario = $codInventario;

        return $this;
    }

    /**
     * Get codInventario
     *
     * @return string
     */
    public function getCodInventario()
    {
        return $this->codInventario;
    }

    /**
     * Get idControlInventario
     *
     * @return integer
     */
    public function getIdControlInventario()
    {
        return $this->idControlInventario;
    }

    /**
     * Set idControl
     *
     * @param \UTN\Bundle\ControlMovilBundle\Entity\Control $idControl
     *
     * @return ControlInventario
     */
    public function setIdControl(\UTN\Bundle\ControlMovilBundle\Entity\Control $idControl = null)
    {
        $this->idControl = $idControl;

        return $this;
    }

    /**
     * Get idControl
     *
     * @return \UTN\Bundle\ControlMovilBundle\Entity\Control
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
     * @return ControlInventario
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
     * Set idInventario
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Inventario $idInventario
     *
     * @return ControlInventario
     */
    public function setIdInventario(\UTN\Bundle\DashboardMainBundle\Entity\Inventario $idInventario = null)
    {
        $this->idInventario = $idInventario;

        return $this;
    }

    /**
     * Get idInventario
     *
     * @return \UTN\Bundle\DashboardMainBundle\Entity\Inventario
     */
    public function getIdInventario()
    {
        return $this->idInventario;
    }
}

