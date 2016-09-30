<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Baja
 *
 * @ORM\Table(name="baja", indexes={@ORM\Index(name="IDX_5CD99360CF93CE22", columns={"id_inventario"}), @ORM\Index(name="IDX_5CD993606A540E", columns={"id_estado"}), @ORM\Index(name="IDX_5CD99360FCF8192D", columns={"id_usuario"})})
 * @ORM\Entity
 */
class Baja
{
    /**
     * @var integer
     *
     * @ORM\Column(name="secuencia", type="smallint", nullable=false)
     */
    private $secuencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=1000, nullable=false)
     */
    private $motivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_baja", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBaja;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Estado
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado", referencedColumnName="id_estado")
     * })
     */
    private $idEstado;

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
     * Set secuencia
     *
     * @param integer $secuencia
     *
     * @return Baja
     */
    public function setSecuencia($secuencia)
    {
        $this->secuencia = $secuencia;

        return $this;
    }

    /**
     * Get secuencia
     *
     * @return integer
     */
    public function getSecuencia()
    {
        return $this->secuencia;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Baja
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
     * Set motivo
     *
     * @param string $motivo
     *
     * @return Baja
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Get idBaja
     *
     * @return integer
     */
    public function getIdBaja()
    {
        return $this->idBaja;
    }

    /**
     * Set idUsuario
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuario
     *
     * @return Baja
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

    /**
     * Set idEstado
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Estado $idEstado
     *
     * @return Baja
     */
    public function setIdEstado(\UTN\Bundle\UsuarioBundle\Entity\Estado $idEstado = null)
    {
        $this->idEstado = $idEstado;

        return $this;
    }

    /**
     * Get idEstado
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Estado
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set idInventario
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Inventario $idInventario
     *
     * @return Baja
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
    /**
     * @var \DateTime
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     */
    private $fechaActualizacion;


    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Baja
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
     * @return Baja
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
}
