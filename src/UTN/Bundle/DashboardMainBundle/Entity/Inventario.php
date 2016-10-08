<?php

namespace UTN\Bundle\DashboardMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inventario
 *
 * @ORM\Table(name="inventario", indexes={@ORM\Index(name="IDX_6A194EF518E40E8D", columns={"id_aula_control"}), @ORM\Index(name="IDX_6A194EF56A540E", columns={"id_estado"})})
 * @ORM\Entity
 */
class Inventario
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
     * @ORM\Column(name="fecha_alta", type="date", nullable=true)
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_actualizacion", type="date", nullable=true)
     */
    private $fechaActualizacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alarma_activa", type="boolean", nullable=true)
     */
    private $alarmaActiva;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etiqueta_impresa", type="boolean", nullable=true)
     */
    private $etiquetaImpresa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_control", type="datetime", nullable=true)
     */
    private $fechaControl;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario_control", type="integer", nullable=true)
     */
    private $idUsuarioControl;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_inventario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idInventario;

    /**
     * @var \UTN\Bundle\DashboardMainBundle\Entity\Estado
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\DashboardMainBundle\Entity\Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado", referencedColumnName="id_estado")
     * })
     */
    private $idEstado;

    /**
     * @var \UTN\Bundle\DashboardMainBundle\Entity\Aula
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\DashboardMainBundle\Entity\Aula")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aula_control", referencedColumnName="id_aula")
     * })
     */
    private $idAulaControl;


    public function __construct() {
        $this->fechaControl = new \DateTime();
    }


    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Inventario
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
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Inventario
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaActualizacion
     *
     * @param \DateTime $fechaActualizacion
     * @return Inventario
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
     * Set alarmaActiva
     *
     * @param boolean $alarmaActiva
     * @return Inventario
     */
    public function setAlarmaActiva($alarmaActiva)
    {
        $this->alarmaActiva = $alarmaActiva;

        return $this;
    }

    /**
     * Get alarmaActiva
     *
     * @return boolean 
     */
    public function getAlarmaActiva()
    {
        return $this->alarmaActiva;
    }

    /**
     * Set etiquetaImpresa
     *
     * @param boolean $etiquetaImpresa
     * @return Inventario
     */
    public function setEtiquetaImpresa($etiquetaImpresa)
    {
        $this->etiquetaImpresa = $etiquetaImpresa;

        return $this;
    }

    /**
     * Get etiquetaImpresa
     *
     * @return boolean 
     */
    public function getEtiquetaImpresa()
    {
        return $this->etiquetaImpresa;
    }

    /**
     * Set fechaControl
     *
     * @param \DateTime $fechaControl
     * @return Inventario
     */
    public function setFechaControl($fechaControl)
    {
        $this->fechaControl = $fechaControl;

        return $this;
    }

    /**
     * Get fechaControl
     *
     * @return \DateTime 
     */
    public function getFechaControl()
    {
        return $this->fechaControl;
    }

    /**
     * Set idUsuarioControl
     *
     * @param integer $idUsuarioControl
     * @return Inventario
     */
    public function setIdUsuarioControl($idUsuarioControl)
    {
        $this->idUsuarioControl = $idUsuarioControl;

        return $this;
    }

    /**
     * Get idUsuarioControl
     *
     * @return integer 
     */
    public function getIdUsuarioControl()
    {
        return $this->idUsuarioControl;
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
     * Set idEstado
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Estado $idEstado
     * @return Inventario
     */
    public function setIdEstado(\UTN\Bundle\DashboardMainBundle\Entity\Estado $idEstado = null)
    {
        $this->idEstado = $idEstado;

        return $this;
    }

    /**
     * Get idEstado
     *
     * @return \UTN\Bundle\DashboardMainBundle\Entity\Estado 
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set idAulaControl
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Aula $idAulaControl
     * @return Inventario
     */
    public function setIdAulaControl(\UTN\Bundle\DashboardMainBundle\Entity\Aula $idAulaControl = null)
    {
        $this->idAulaControl = $idAulaControl;

        return $this;
    }

    /**
     * Get idAulaControl
     *
     * @return \UTN\Bundle\DashboardMainBundle\Entity\Aula 
     */
    public function getIdAulaControl()
    {
        return $this->idAulaControl;
    }
}
