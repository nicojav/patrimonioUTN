<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransferenciaHistorico
 *
 * @ORM\Table(name="transferencia_historico", indexes={@ORM\Index(name="IDX_14A17EB853EAF655", columns={"id_transferencia"}), @ORM\Index(name="IDX_14A17EB8825FEB10", columns={"id_estado_transferencia"}), @ORM\Index(name="IDX_14A17EB8FCF8192D", columns={"id_usuario"})})
 * @ORM\Entity
 */
class TransferenciaHistorico
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=1000, nullable=true)
     */
    private $descripcion;

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
     * @var integer
     *
     * @ORM\Column(name="id_transferencia_historico", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTransferenciaHistorico;

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
     * @var \UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado_transferencia", referencedColumnName="id_estado_transferencia")
     * })
     */
    private $idEstadoTransferencia;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Transferencia
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Transferencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_transferencia", referencedColumnName="id_transferencia")
     * })
     */
    private $idTransferencia;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return TransferenciaHistorico
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
     * Set secuencia
     *
     * @param integer $secuencia
     *
     * @return TransferenciaHistorico
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
     * @return TransferenciaHistorico
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
     * Get idTransferenciaHistorico
     *
     * @return integer
     */
    public function getIdTransferenciaHistorico()
    {
        return $this->idTransferenciaHistorico;
    }

    /**
     * Set idUsuario
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuario
     *
     * @return TransferenciaHistorico
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
     * Set idEstadoTransferencia
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia $idEstadoTransferencia
     *
     * @return TransferenciaHistorico
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
     * Set idTransferencia
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Transferencia $idTransferencia
     *
     * @return TransferenciaHistorico
     */
    public function setIdTransferencia(\UTN\Bundle\UsuarioBundle\Entity\Transferencia $idTransferencia = null)
    {
        $this->idTransferencia = $idTransferencia;

        return $this;
    }

    /**
     * Get idTransferencia
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Transferencia
     */
    public function getIdTransferencia()
    {
        return $this->idTransferencia;
    }
}
