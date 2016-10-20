<?php

namespace UTN\Bundle\ControlMovilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ControlInventario
 *
 * @ORM\Table(name="control_inventario", indexes={@ORM\Index(name="IDX_27DD2C2CCF93CE22", columns={"id_inventario"}), @ORM\Index(name="IDX_27DD2C2CF2EC3E9C", columns={"id_estado_control"}), @ORM\Index(name="IDX_27DD2C2C3346853B", columns={"id_control"})})
 * @ORM\Entity
 */
class ControlInventario
{
    /**
     * @var string
     *
     * @ORM\Column(name="cod_inventario", type="string", length=10, nullable=true)
     */
    private $codInventario;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_control_inventario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idControlInventario;

    /**
     * @var \UTN\Bundle\ControlMovilBundle\Entity\Control
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\ControlMovilBundle\Entity\Control")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_control", referencedColumnName="id_control")
     * })
     */
    private $idControl;

    /**
     * @var \UTN\Bundle\ControlMovilBundle\Entity\EstadoControl
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\ControlMovilBundle\Entity\EstadoControl")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado_control", referencedColumnName="id_estado_control")
     * })
     */
    private $idEstadoControl;

    /**
     * @var \UTN\Bundle\DashboardMainBundle\Entity\Inventario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\DashboardMainBundle\Entity\Inventario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_inventario", referencedColumnName="id_inventario")
     * })
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
