<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transferencia
 *
 * @ORM\Table(name="transferencia", indexes={@ORM\Index(name="IDX_EDC22730CF93CE22", columns={"id_inventario"}), @ORM\Index(name="IDX_EDC22730825FEB10", columns={"id_estado_transferencia"}), @ORM\Index(name="IDX_EDC2273052BB3AEC", columns={"id_responsable_origen"}), @ORM\Index(name="IDX_EDC22730DBD36EC2", columns={"id_responsable_destino"}), @ORM\Index(name="IDX_EDC22730B530471D", columns={"id_usuario_origen"}), @ORM\Index(name="IDX_EDC22730118E2735", columns={"id_usuario_destino"})})
 * @ORM\Entity
 */
class Transferencia
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=1000, nullable=true)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_actualizacion", type="date", nullable=false)
     */
    private $fechaActualizacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_transferencia", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTransferencia;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_origen", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioOrigen;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_destino", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioDestino;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_responsable_destino", referencedColumnName="id_usuario")
     * })
     */
    private $idResponsableDestino;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_responsable_origen", referencedColumnName="id_usuario")
     * })
     */
    private $idResponsableOrigen;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado_transferencia", referencedColumnName="id_estado_transferencia")
     * })
     */
    private $idEstadoTransferencia;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Inventario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Inventario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_inventario", referencedColumnName="id_inventario")
     * })
     */
    private $idInventario;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Transferencia
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Transferencia
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaActualizacion
     *
     * @param \DateTime $fechaActualizacion
     *
     * @return Transferencia
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;

        return $this;
    }

    /**
     * Get fechaActualizacion
     *
     * @return \DateTime
     */
    public function getFechaActualizacion()
    {
        return $this->fechaActualizacion;
    }

    /**
     * Get idTransferencia
     *
     * @return integer
     */
    public function getIdTransferencia()
    {
        return $this->idTransferencia;
    }

    /**
     * Set idUsuarioOrigen
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuarioOrigen
     *
     * @return Transferencia
     */
    public function setIdUsuarioOrigen(\UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuarioOrigen = null)
    {
        $this->idUsuarioOrigen = $idUsuarioOrigen;

        return $this;
    }

    /**
     * Get idUsuarioOrigen
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Usuario
     */
    public function getIdUsuarioOrigen()
    {
        return $this->idUsuarioOrigen;
    }

    /**
     * Set idUsuarioDestino
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuarioDestino
     *
     * @return Transferencia
     */
    public function setIdUsuarioDestino(\UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuarioDestino = null)
    {
        $this->idUsuarioDestino = $idUsuarioDestino;

        return $this;
    }

    /**
     * Get idUsuarioDestino
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Usuario
     */
    public function getIdUsuarioDestino()
    {
        return $this->idUsuarioDestino;
    }

    /**
     * Set idResponsableDestino
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Usuario $idResponsableDestino
     *
     * @return Transferencia
     */
    public function setIdResponsableDestino(\UTN\Bundle\UsuarioBundle\Entity\Usuario $idResponsableDestino = null)
    {
        $this->idResponsableDestino = $idResponsableDestino;

        return $this;
    }

    /**
     * Get idResponsableDestino
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Usuario
     */
    public function getIdResponsableDestino()
    {
        return $this->idResponsableDestino;
    }

    /**
     * Set idResponsableOrigen
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Usuario $idResponsableOrigen
     *
     * @return Transferencia
     */
    public function setIdResponsableOrigen(\UTN\Bundle\UsuarioBundle\Entity\Usuario $idResponsableOrigen = null)
    {
        $this->idResponsableOrigen = $idResponsableOrigen;

        return $this;
    }

    /**
     * Get idResponsableOrigen
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Usuario
     */
    public function getIdResponsableOrigen()
    {
        return $this->idResponsableOrigen;
    }

    /**
     * Set idEstadoTransferencia
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia $idEstadoTransferencia
     *
     * @return Transferencia
     */
    public function setIdEstadoTransferencia(\UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia $idEstadoTransferencia = null)
    {
        $this->idEstadoTransferencia = $idEstadoTransferencia;

        return $this;
    }

    /**
     * Get idEstadoTransferencia
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia
     */
    public function getIdEstadoTransferencia()
    {
        return $this->idEstadoTransferencia;
    }

    /**
     * Set idInventario
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Inventario $idInventario
     *
     * @return Transferencia
     */
    public function setIdInventario(\UTN\Bundle\UsuarioBundle\Entity\Inventario $idInventario = null)
    {
        $this->idInventario = $idInventario;

        return $this;
    }

    /**
     * Get idInventario
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Inventario
     */
    public function getIdInventario()
    {
        return $this->idInventario;
    }
}
