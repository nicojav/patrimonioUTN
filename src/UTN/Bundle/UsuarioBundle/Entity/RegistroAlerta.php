<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegistroAlerta
 *
 * @ORM\Table(name="registro_alerta", indexes={@ORM\Index(name="IDX_986CC28BCF93CE22", columns={"id_inventario"})})
 * @ORM\Entity
 */
class RegistroAlerta
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_registro_alerta", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRegistroAlerta;

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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return RegistroAlerta
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
     * Get idRegistroAlerta
     *
     * @return integer
     */
    public function getIdRegistroAlerta()
    {
        return $this->idRegistroAlerta;
    }

    /**
     * Set idInventario
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Inventario $idInventario
     *
     * @return RegistroAlerta
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
