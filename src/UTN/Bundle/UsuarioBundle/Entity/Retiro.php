<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Retiro
 *
 * @ORM\Table(name="retiro", indexes={@ORM\Index(name="IDX_C5A5558DCF93CE22", columns={"id_inventario"})})
 * @ORM\Entity
 */
class Retiro
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

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
     * @ORM\Column(name="fecha_desde", type="datetime", nullable=false)
     */
    private $fechaDesde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hasta", type="datetime", nullable=true)
     */
    private $fechaHasta;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_retiro", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRetiro;

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
     * @return Retiro
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
     * Get idRetiro
     *
     * @return integer
     */
    public function getIdRetiro()
    {
        return $this->idRetiro;
    }

    /**
     * Set idInventario
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Inventario $idInventario
     *
     * @return Retiro
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
