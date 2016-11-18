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
    protected $nombreCompleto;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="decimal", precision=8, scale=0, nullable=false)
     */
    protected $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=15, nullable=false)
     */
    protected $telefono;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_desde", type="datetime", nullable=true)
     */
    protected $fechaDesde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hasta", type="datetime", nullable=true)
     */
    protected $fechaHasta;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_retiro", type="string", length=1, nullable=false)
     */
    protected $estadoRetiro = 'P';

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=60, nullable=true)
     */
    protected $motivo = 'Sin Motivo';

    /**
     * @var integer
     *
     * @ORM\Column(name="id_retiro", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $idRetiro;

    /**
     * @var \UTN\Bundle\InventariosBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\InventariosBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    protected $idUsuario;

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


    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="UTN\Bundle\RetirosBundle\Entity\RetiroBody", mappedBy="idRetiro", cascade={"persist"})
     */
    protected $idInventario;


    public function __construct() {
        $this->idInventario = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add Inventario
     *
     * @param \UTN\Bundle\RetirosBundle\Entity\RetiroBody $idInventario
     * @return \UTN\Bundle\RetirosBundle\Entity\RetiroBody
     */
    public function addIdInventario(\UTN\Bundle\RetirosBundle\Entity\RetiroBody $retiroBody )
    {

        $retiroBody->setIdRetiro($this);
        $this->idInventario[] = $retiroBody;

    }

    /**
     * Remove entityTwo
     *
     * @param \UTN\Bundle\RetirosBundle\Entity\RetiroBody $transInventario
     */
    public function removeIdInventario(\UTN\Bundle\RetirosBundle\Entity\RetiroBody $transInventario)
    {
        $this->idInventario->removeElement($transInventario);
    }


    /**
     * Set idInventario
     *
     * @param \UTN\Bundle\RetirosBundle\Entity\RetiroBody $transInventario
     *
     * @return Retiro
     */
    public function setIdInventario(\UTN\Bundle\RetirosBundle\Entity\RetiroBody $transInventario) //Array transInventario
    {
        $this->idInventario = new ArrayCollection(); //necesario??

        foreach ($transInventario as $idTrans) {
            $this->addIdInventario($idTrans);
        }
    }

    /**
     * Get idInventario
     *
     * @return \UTN\Bundle\DashboardMainBundle\Entity\Inventario
     */
    public function getIdInventario()
    {
        return $this->idInventario;
    }
    /**
     * Set idUsuario
     *
     * @param \UTN\Bundle\InventariosBundle\Entity\Usuario $idUsuario
     *
     * @return Retiro
     */
    public function setIdUsuario(\UTN\Bundle\InventariosBundle\Entity\Usuario $idUsuario = null)
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
