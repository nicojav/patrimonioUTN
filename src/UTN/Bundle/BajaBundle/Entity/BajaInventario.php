<?php

namespace UTN\Bundle\BajaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BajaInventario
 *
 * @ORM\Table(name="baja_inventario", uniqueConstraints={@ORM\UniqueConstraint(name="UK_baja_inventario", columns={"id_baja", "id_inventario"})}, indexes={@ORM\Index(name="IDX_C9370AB4CF93CE22", columns={"id_inventario"}), @ORM\Index(name="IDX_C9370AB4D7F98F62", columns={"id_baja"})})
 * @ORM\Entity
 */
class BajaInventario
{
    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=1000, nullable=false)
     */
    protected $motivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_baja_inventario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $idBajaInventario;

    /**
     * @var \UTN\Bundle\BajaBundle\Entity\Baja
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\BajaBundle\Entity\Baja", inversedBy="idInventario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_baja", referencedColumnName="id_baja")
     * })
     */
    protected $idBaja;

    /**
     * @var \UTN\Bundle\InventariosBundle\Entity\Inventario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\InventariosBundle\Entity\Inventario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_inventario", referencedColumnName="id_inventario")
     * })
     */
    protected $idInventario;



    /**
     * Set motivo
     *
     * @param string $motivo
     *
     * @return BajaInventario
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
     * Get idBajaInventario
     *
     * @return integer
     */
    public function getIdBajaInventario()
    {
        return $this->idBajaInventario;
    }

    /**
     * Set idBaja
     *
     * @param \UTN\Bundle\BajaBundle\Entity\Baja $idBaja
     *
     * @return BajaInventario
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
     * Set idInventario
     *
     * @param \UTN\Bundle\InventariosBundle\Entity\Inventario $idInventario
     *
     * @return BajaInventario
     */
    public function setIdInventario(\UTN\Bundle\InventariosBundle\Entity\Inventario $idInventario = null)
    {
        $this->idInventario = $idInventario;

        return $this;
    }

    /**
     * Get idInventario
     *
     * @return \UTN\Bundle\InventariosBundle\Entity\Inventario
     */
    public function getIdInventario()
    {
        return $this->idInventario;
    }


    public function __toString()
    {
        return (String)$this->getIdBaja().' | '.$this->getIdInventario();
    }

}
