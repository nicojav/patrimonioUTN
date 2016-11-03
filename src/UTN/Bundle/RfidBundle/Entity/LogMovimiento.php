<?php

namespace UTN\Bundle\RfidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogMovimiento
 *
 * @ORM\Table(name="log_movimiento", indexes={@ORM\Index(name="IDX_C2E9BCC1CF93CE22", columns={"id_inventario"}), @ORM\Index(name="IDX_C2E9BCC19AB1A25D", columns={"id_sensor"})})
 * @ORM\Entity
 */
class LogMovimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_log_movimiento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLogMovimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var \Inventario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\DashboardMainBundle\Entity\Inventario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_inventario", referencedColumnName="id_inventario")
     * })
     */
    private $idInventario;

    /**
     * @var \Sensor
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\RfidBundle\Entity\Sensor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sensor", referencedColumnName="id_sensor")
     * })
     */
    private $idSensor;

    /**
     * @var \EstadoMovimiento
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\RfidBundle\Entity\EstadoMovimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado_movimiento", referencedColumnName="id_estado_movimiento")
     * })
     */
    private $idEstadoMovimiento;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Usuario
     */
    private $idUsuario;


    /**
     * Get idLogMovimiento
     *
     * @return integer
     */
    public function getIdLogMovimiento()
    {
        return $this->idLogMovimiento;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return LogMovimiento
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
     * Set idInventario
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Inventario $idInventario
     *
     * @return LogMovimiento
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

    /**
     * Set idSensor
     *
     * @param \UTN\Bundle\RfidBundle\Entity\Sensor $idSensor
     *
     * @return LogMovimiento
     */
    public function setIdSensor(\UTN\Bundle\RfidBundle\Entity\Sensor $idSensor = null)
    {
        $this->idSensor = $idSensor;

        return $this;
    }

    /**
     * Get idSensor
     *
     * @return \UTN\Bundle\RfidBundle\Entity\Sensor
     */
    public function getIdSensor()
    {
        return $this->idSensor;
    }

    /**
     * Set idEstadoMovimiento
     *
     * @param \UTN\Bundle\RfidBundle\Entity\EstadoMovimiento $idEstadoMovimiento
     *
     * @return LogMovimiento
     */
    public function setIdEstadoMovimiento(\UTN\Bundle\RfidBundle\Entity\EstadoMovimiento $idEstadoMovimiento = null)
    {
        $this->idEstadoMovimiento = $idEstadoMovimiento;

        return $this;
    }

    /**
     * Get idEstadoMovimiento
     *
     * @return \UTN\Bundle\RfidBundle\Entity\EstadoMovimiento
     */
    public function getIdEstadoMovimiento()
    {
        return $this->idEstadoMovimiento;
    }

    public function __toString()
    {
        return  (String)$this->getIdLogMovimiento();
    }
    /**
     * Set idUsuario
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuario
     *
     * @return LogMovimiento
     */
    public function setIdUsuario(\UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Usuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}
