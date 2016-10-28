<?php

namespace UTN\Bundle\DashboardMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inventario
 *
 * @ORM\Table(name="inventario", uniqueConstraints={@ORM\UniqueConstraint(name="UK_inventario", columns={"cod_nro_inventario", "cod_dependencia", "cod_grupo"})}, indexes={@ORM\Index(name="IDX_6A194EF54A40C0F0", columns={"id_responsable"}), @ORM\Index(name="IDX_6A194EF518E40E8D", columns={"id_aula_control"}), @ORM\Index(name="IDX_6A194EF56A540E", columns={"id_estado"}), @ORM\Index(name="IDX_6A194EF517F00A22", columns={"id_cuenta"}), @ORM\Index(name="IDX_6A194EF52195BD9D", columns={"id_especie"})})
 * @ORM\Entity
 */
class Inventario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_inventario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idInventario;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=1000, nullable=true)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="date", nullable=false)
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_actualizacion", type="date", nullable=false)
     */
    private $fechaActualizacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alarma_activa", type="boolean", nullable=false)
     */
    private $alarmaActiva;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etiqueta_impresa", type="boolean", nullable=false)
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
     * @ORM\Column(name="cod_nro_inventario", type="integer", nullable=true)
     */
    private $codNroInventario;

    /**
     * @var integer
     *
     * @ORM\Column(name="cod_dependencia", type="smallint", nullable=true)
     */
    private $codDependencia;

    /**
     * @var integer
     *
     * @ORM\Column(name="cod_grupo", type="smallint", nullable=true)
     */
    private $codGrupo;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_responsable", referencedColumnName="id_usuario")
     * })
     */
    private $idResponsable;

    /**
     * @var \Aula
     *
     * @ORM\ManyToOne(targetEntity="Aula")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aula_control", referencedColumnName="id_aula")
     * })
     */
    private $idAulaControl;

    /**
     * @var \Estado
     *
     * @ORM\ManyToOne(targetEntity="Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado", referencedColumnName="id_estado")
     * })
     */
    private $idEstado;

    /**
     * @var \Cuenta
     *
     * @ORM\ManyToOne(targetEntity="Cuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cuenta", referencedColumnName="id_cuenta")
     * })
     */
    private $idCuenta;

    /**
     * @var \Especie
     *
     * @ORM\ManyToOne(targetEntity="Especie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_especie", referencedColumnName="id_especie")
     * })
     */
    private $idEspecie;

    public function __construct() {
        /*$timezone = new \DateTimeZone("America/Argentina/Buenos_Aires");
        $this->fechaControl = new \DateTime($timezone);*/
        //$this->fechaControl = new \DateTime(); //BORRAR EN LA IMPLEMENTACION
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
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
     *
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
     *
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
     *
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
     *
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
     *
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
     *
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
     * Set codNroInventario
     *
     * @param integer $codNroInventario
     *
     * @return Inventario
     */
    public function setCodNroInventario($codNroInventario)
    {
        $this->codNroInventario = $codNroInventario;

        return $this;
    }

    /**
     * Get codNroInventario
     *
     * @return integer
     */
    public function getCodNroInventario()
    {
        return $this->codNroInventario;
    }

    /**
     * Set codDependencia
     *
     * @param integer $codDependencia
     *
     * @return Inventario
     */
    public function setCodDependencia($codDependencia)
    {
        $this->codDependencia = $codDependencia;

        return $this;
    }

    /**
     * Get codDependencia
     *
     * @return integer
     */
    public function getCodDependencia()
    {
        return $this->codDependencia;
    }

    /**
     * Set codGrupo
     *
     * @param integer $codGrupo
     *
     * @return Inventario
     */
    public function setCodGrupo($codGrupo)
    {
        $this->codGrupo = $codGrupo;

        return $this;
    }

    /**
     * Get codGrupo
     *
     * @return integer
     */
    public function getCodGrupo()
    {
        return $this->codGrupo;
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
     * Set idEspecie
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Especie $idEspecie
     *
     * @return Inventario
     */
    public function setIdEspecie(\UTN\Bundle\DashboardMainBundle\Entity\Especie $idEspecie = null)
    {
        $this->idEspecie = $idEspecie;

        return $this;
    }

    /**
     * Get idEspecie
     *
     * @return \UTN\Bundle\DashboardMainBundle\Entity\Especie
     */
    public function getIdEspecie()
    {
        return $this->idEspecie;
    }

    /**
     * Set idCuenta
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Cuenta $idCuenta
     *
     * @return Inventario
     */
    public function setIdCuenta(\UTN\Bundle\DashboardMainBundle\Entity\Cuenta $idCuenta = null)
    {
        $this->idCuenta = $idCuenta;

        return $this;
    }

    /**
     * Get idCuenta
     *
     * @return \UTN\Bundle\DashboardMainBundle\Entity\Cuenta
     */
    public function getIdCuenta()
    {
        return $this->idCuenta;
    }

    /**
     * Set idEstado
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Estado $idEstado
     *
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
     *
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

    /**
     * Set idResponsable
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Usuario $idResponsable
     *
     * @return Inventario
     */
    public function setIdResponsable(\UTN\Bundle\UsuarioBundle\Entity\Usuario $idResponsable = null)
    {
        $this->idResponsable = $idResponsable;

        return $this;
    }

    /**
     * Get idResponsable
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Usuario
     */
    public function getIdResponsable()
    {
        return $this->idResponsable;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return  $this->getDescripcion() ?: "n/a";
    }
}
