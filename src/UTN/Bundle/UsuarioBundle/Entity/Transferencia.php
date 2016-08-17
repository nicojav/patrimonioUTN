<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transferencia
 *
 * @ORM\Table(name="Transferencia")
 * @ORM\Entity
 */
class Transferencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_inventario", type="integer", nullable=false)
     */
    private $idInventario;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_responsable_anterior", type="integer", nullable=false)
     */
    private $idResponsableAnterior;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_responsable_nuevo", type="integer", nullable=true)
     */
    private $idResponsableNuevo;

    /**
     * @var integer
     *
     * @ORM\Column(name="aprobado", type="smallint", nullable=true)
     */
    private $aprobado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_solicitud", type="datetime", nullable=true)
     */
    private $fechaSolicitud;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="datetime", nullable=true)
     */
    private $fechaFin;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_transferencia", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTransferencia;



    /**
     * Set idInventario
     *
     * @param integer $idInventario
     * @return Transferencia
     */
    public function setIdInventario($idInventario)
    {
        $this->idInventario = $idInventario;

        return $this;
    }

    /**
     * Get idInventario
     *
     * @return integer 
     */
    public function getIdInventario()
    {
        return $this->idInventario;
    }

    /**
     * Set idResponsableAnterior
     *
     * @param integer $idResponsableAnterior
     * @return Transferencia
     */
    public function setIdResponsableAnterior($idResponsableAnterior)
    {
        $this->idResponsableAnterior = $idResponsableAnterior;

        return $this;
    }

    /**
     * Get idResponsableAnterior
     *
     * @return integer 
     */
    public function getIdResponsableAnterior()
    {
        return $this->idResponsableAnterior;
    }

    /**
     * Set idResponsableNuevo
     *
     * @param integer $idResponsableNuevo
     * @return Transferencia
     */
    public function setIdResponsableNuevo($idResponsableNuevo)
    {
        $this->idResponsableNuevo = $idResponsableNuevo;

        return $this;
    }

    /**
     * Get idResponsableNuevo
     *
     * @return integer 
     */
    public function getIdResponsableNuevo()
    {
        return $this->idResponsableNuevo;
    }

    /**
     * Set aprobado
     *
     * @param integer $aprobado
     * @return Transferencia
     */
    public function setAprobado($aprobado)
    {
        $this->aprobado = $aprobado;

        return $this;
    }

    /**
     * Get aprobado
     *
     * @return integer 
     */
    public function getAprobado()
    {
        return $this->aprobado;
    }

    /**
     * Set fechaSolicitud
     *
     * @param \DateTime $fechaSolicitud
     * @return Transferencia
     */
    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;

        return $this;
    }

    /**
     * Get fechaSolicitud
     *
     * @return \DateTime 
     */
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Transferencia
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
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
}
