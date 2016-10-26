<?php

namespace UTN\Bundle\RetirosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Retiro
 *
 * @ORM\Table(name="retiro")
 * @ORM\Entity
 */
class Retiro
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_completo", type="string", length=60, nullable=false)
     */
    private $nombreCompleto;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="decimal", precision=8, scale=0, nullable=false)
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=15, nullable=false)
     */
    private $telefono;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_desde", type="datetime", nullable=true)
     */
    private $fechaDesde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hasta", type="datetime", nullable=true)
     */
    private $fechaHasta;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_retiro", type="string", length=1, nullable=false)
     */
    private $estadoRetiro = 'P';

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=60, nullable=true)
     */
    private $motivo = 'Sin Motivo';

    /**
     * @var integer
     *
     * @ORM\Column(name="id_retiro", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRetiro;



    /**
     * Set nombreCompleto
     *
     * @param string $nombreCompleto
     *
     * @return Retiro
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;

        return $this;
    }

    /**
     * Get nombreCompleto
     *
     * @return string
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    /**
     * Set documento
     *
     * @param string $documento
     *
     * @return Retiro
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Retiro
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     *
     * @return Retiro
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;

        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     *
     * @return Retiro
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;

        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    /**
     * Set estadoRetiro
     *
     * @param string $estadoRetiro
     *
     * @return Retiro
     */
    public function setEstadoRetiro($estadoRetiro)
    {
        $this->estadoRetiro = $estadoRetiro;

        return $this;
    }

    /**
     * Get estadoRetiro
     *
     * @return string
     */
    public function getEstadoRetiro()
    {
        return $this->estadoRetiro;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     *
     * @return Retiro
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
     * Get idRetiro
     *
     * @return integer
     */
    public function getIdRetiro()
    {
        return $this->idRetiro;
    }

    public function __toString()
    {
        return  (String)$this->getIdRetiro() ?: "n/a";
    }

}
