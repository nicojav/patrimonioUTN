<?php

namespace UTN\Bundle\BajaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Baja
 *
 * @ORM\Table(name="baja", indexes={@ORM\Index(name="IDX_5CD99360FCF8192D", columns={"id_usuario"}), @ORM\Index(name="IDX_5CD993606A540E", columns={"id_estado"})})
 * @ORM\Entity
 */
class Baja
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     */
    protected $fechaInicio = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_actualizacion", type="date", nullable=false)
     */
    protected $fechaActualizacion = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=1000, nullable=false)
     */
    protected $motivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_baja", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $idBaja;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="UTN\Bundle\BajaBundle\Entity\BajaInventario", mappedBy="idBaja", cascade={"persist"})
     */
    protected $idInventario;

    /**
     * @var \UTN\Bundle\DashboardMainBundle\Entity\Estado
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\DashboardMainBundle\Entity\Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado", referencedColumnName="id_estado")
     * })
     */
    protected $idEstado;


    protected $idUsuario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idInventario = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Add idInventario
     *
     * @param \UTN\Bundle\BajaBundle\Entity\BajaInventario $idInventario
     *
     * @return Baja
     */
    public function addIdInventario(\UTN\Bundle\BajaBundle\Entity\BajaInventario $idInventario)
    {
        $this->idInventario[] = $idInventario;

        return $this;
    }

    /**
     * Remove idInventario
     *
     * @param \UTN\Bundle\BajaBundle\Entity\BajaInventario $idInventario
     */
    public function removeIdInventario(\UTN\Bundle\BajaBundle\Entity\BajaInventario $idInventario)
    {
        $this->idInventario->removeElement($idInventario);
    }

    /**
     * Get idInventario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdInventario()
    {
        return $this->idInventario;
    }

    /**
     * Set idEstado
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Estado $idEstado
     *
     * @return Baja
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
     * Set idUsuario
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuario
     *
     * @return Baja
     */
    public function setIdUsuario($idUsuario = null)
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

    public function __toString()
    {
        return  'TB: '.(String)$this->getIdBaja() ?: "n/a";
    }
}
