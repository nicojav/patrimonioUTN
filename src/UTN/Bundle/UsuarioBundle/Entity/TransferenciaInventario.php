<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransferenciaInventario
 */
class TransferenciaInventario
{
    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
     */
    private $idTransferenciaInventario;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Inventario
     *
     * @ORM\ManyToOne(targetEntity="\UTN\Bundle\UsuarioBundle\Entity\Inventario", cascade={"persist"})
     * @ORM\JoinColumn(name="id_inventario", referencedColumnName="id_inventario",nullable=true)
     */
    protected $idInventario;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Transferencia
     *
     * @ORM\ManyToOne(targetEntity="\UTN\Bundle\UsuarioBundle\Entity\Transferencia", inversedBy="idInventario", cascade={"persist"})
     * @ORM\JoinColumn(name="id_transferencia", referencedColumnName="id_transferencia",nullable=true)
     */
    protected $idTransferencia;


    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return TransferenciaInventario
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
     * Get idTransferenciaInventario
     *
     * @return integer
     */
    public function getIdTransferenciaInventario()
    {
        return $this->idTransferenciaInventario;
    }

    /**
     * Set idInventario
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Inventario $idInventario
     *
     * @return TransferenciaInventario
     */
    public function setIdInventario(\UTN\Bundle\UsuarioBundle\Entity\Transferencia $transferencia = null)
    {
        $this->idInventario = $transferencia;

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

    /**
     * Set idTransferencia
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Transferencia $idTransferencia
     *
     * @return TransferenciaInventario
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


    public function __toString()
    {
        return (String)$this->getIdTransferencia().' | '.$this->getIdInventario();
    }


}

