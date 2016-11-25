<?php

namespace UTN\Bundle\ControlMovilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UTN\Bundle\UsuarioBundle\Entity;

/**
 * Control
 *
 * @ORM\Table(name="control", indexes={@ORM\Index(name="IDX_EDDB2C4BFCF8192D", columns={"id_usuario"}), @ORM\Index(name="IDX_EDDB2C4B88398CA6", columns={"id_aula"}), @ORM\Index(name="IDX_EDDB2C4BF2EC3E9C", columns={"id_estado_control"})})
 * @ORM\Entity
 */
class Control
{
    /**
     * @var string
     *
     * @ORM\Column(name="xml", type="string", length=-1, nullable=false)
     */
    private $xml;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_fecha", type="string", length=20, nullable=true)
     */
    private $codFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_aula", type="string", length=10, nullable=true)
     */
    private $codAula;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_usuario", type="string", length=30, nullable=true)
     */
    private $codUsuario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_corrida", type="datetime", nullable=false)
     */
    private $fechaCorrida;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_control", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idControl;

    /**
     * @var \UTN\Bundle\ControlMovilBundle\Entity\EstadoControl
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\ControlMovilBundle\Entity\EstadoControl")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado_control", referencedColumnName="id_estado_control")
     * })
     */
    private $idEstadoControl;

    /**
     * @var \UTN\Bundle\InventariosBundle\Entity\Aula
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\InventariosBundle\Entity\Aula")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aula", referencedColumnName="id_aula")
     * })
     */
    private $idAula;

    /**
     * @var \UTN\Bundle\InventariosBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\InventariosBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;



    /**
     * Set xml
     *
     * @param string $xml
     *
     * @return Control
     */
    public function setXml($xml)
    {
        $this->xml = $xml;

        return $this;
    }

    /**
     * Get xml
     *
     * @return string
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Control
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
     * Set codFecha
     *
     * @param string $codFecha
     *
     * @return Control
     */
    public function setCodFecha($codFecha)
    {
        $this->codFecha = $codFecha;

        return $this;
    }

    /**
     * Get codFecha
     *
     * @return string
     */
    public function getCodFecha()
    {
        return $this->codFecha;
    }

    /**
     * Set codAula
     *
     * @param string $codAula
     *
     * @return Control
     */
    public function setCodAula($codAula)
    {
        $this->codAula = $codAula;

        return $this;
    }

    /**
     * Get codAula
     *
     * @return string
     */
    public function getCodAula()
    {
        return $this->codAula;
    }

    /**
     * Set codUsuario
     *
     * @param string $codUsuario
     *
     * @return Control
     */
    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;

        return $this;
    }

    /**
     * Get codUsuario
     *
     * @return string
     */
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }

    /**
     * Set fechaCorrida
     *
     * @param \DateTime $fechaCorrida
     *
     * @return Control
     */
    public function setFechaCorrida($fechaCorrida)
    {
        $this->fechaCorrida = $fechaCorrida;

        return $this;
    }

    /**
     * Get fechaCorrida
     *
     * @return \DateTime
     */
    public function getFechaCorrida()
    {
        return $this->fechaCorrida;
    }

    /**
     * Get idControl
     *
     * @return integer
     */
    public function getIdControl()
    {
        return $this->idControl;
    }

    /**
     * Set idEstadoControl
     *
     * @param \UTN\Bundle\ControlMovilBundle\Entity\EstadoControl $idEstadoControl
     *
     * @return Control
     */
    public function setIdEstadoControl(\UTN\Bundle\ControlMovilBundle\Entity\EstadoControl $idEstadoControl = null)
    {
        $this->idEstadoControl = $idEstadoControl;

        return $this;
    }

    /**
     * Get idEstadoControl
     *
     * @return \UTN\Bundle\ControlMovilBundle\Entity\EstadoControl
     */
    public function getIdEstadoControl()
    {
        return $this->idEstadoControl;
    }

    /**
     * Set idAula
     *
     * @param \UTN\Bundle\InventariosBundle\Entity\Aula $idAula
     *
     * @return Control
     */
    public function setIdAula(\UTN\Bundle\InventariosBundle\Entity\Aula $idAula = null)
    {
        $this->idAula = $idAula;

        return $this;
    }

    /**
     * Get idAula
     *
     * @return \UTN\Bundle\InventariosBundle\Entity\Aula
     */
    public function getIdAula()
    {
        return $this->idAula;
    }

    /**
     * Set idUsuario
     *
     * @param \UTN\Bundle\InventariosBundle\Entity\Usuario $idUsuario
     *
     * @return Control
     */
    public function setIdUsuario(\UTN\Bundle\InventariosBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \UTN\Bundle\InventariosBundle\Entity\Usuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function __toString()
    {
        return  (String)$this->getIdControl() ?: "n/a";
    }
}
