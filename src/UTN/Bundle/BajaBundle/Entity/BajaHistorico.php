<?php

namespace UTN\Bundle\BajaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BajaHistorico
 *
 * @ORM\Table(name="baja_historico", uniqueConstraints={@ORM\UniqueConstraint(name="UK_baja_historico", columns={"id_baja", "secuencia"})}, indexes={@ORM\Index(name="IDX_1FEE0008FCF8192D", columns={"id_usuario"}), @ORM\Index(name="IDX_1FEE00086A540E", columns={"id_estado"}), @ORM\Index(name="IDX_1FEE0008D7F98F62", columns={"id_baja"})})
 * @ORM\Entity
 */
class BajaHistorico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="secuencia", type="smallint", nullable=false)
     */
    protected $secuencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    protected $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=1000, nullable=false)
     */
    protected $motivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_baja_historico", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $idBajaHistorico;

    /**
     * @var \UTN\Bundle\BajaBundle\Entity\Baja
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\BajaBundle\Entity\Baja")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_baja", referencedColumnName="id_baja")
     * })
     */
    protected $idBaja;

    /**
     * @var \UTN\Bundle\DashboardMainBundle\Estado
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\DashboardMainBundle\Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado", referencedColumnName="id_estado")
     * })
     */
    protected $idEstado;

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
     * Set secuencia
     *
     * @param integer $secuencia
     *
     * @return BajaHistorico
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
     * @return BajaHistorico
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
     * @return BajaHistorico
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
     * Get idBajaHistorico
     *
     * @return integer
     */
    public function getIdBajaHistorico()
    {
        return $this->idBajaHistorico;
    }

    /**
     * Set idBaja
     *
     * @param \UTN\Bundle\BajaBundle\Entity\Baja $idBaja
     *
     * @return BajaHistorico
     */
    public function setIdBaja(\UTN\Bundle\BajaBundle\Entity\Baja $idBaja = null)
    {
        $this->idBaja = $idBaja;

        return $this;
    }

    /**
     * Get idBaja
     *
     * @return \UTN\Bundle\BajaBundle\Entity\Baja
     */
    public function getIdBaja()
    {
        return $this->idBaja;
    }

    /**
     * Set idEstado
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Estado $idEstado
     *
     * @return BajaHistorico
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
     * @return BajaHistorico
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
