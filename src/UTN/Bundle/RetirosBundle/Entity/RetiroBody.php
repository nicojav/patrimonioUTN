<?php

namespace UTN\Bundle\RetirosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RetiroBody
 *
 * @ORM\Table(name="retiro_body", indexes={@ORM\Index(name="IDX_5A164C9ACF93CE22", columns={"id_inventario"}), @ORM\Index(name="IDX_5A164C9AE392E060", columns={"id_retiro"})})
 * @ORM\Entity
 */
class RetiroBody
{
    protected $parentAssociationMapping = 'retiro';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \UTN\Bundle\RetirosBundle\Entity\Retiro
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\RetirosBundle\Entity\Retiro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_retiro", referencedColumnName="id_retiro")
     * })
     */
    private $idRetiro;

    /**
     * @var \UTN\Bundle\DashboardMainBundle\Entity\Inventario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\DashboardMainBundle\Entity\Inventario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_inventario", referencedColumnName="id_inventario")
     * })
     */
    private $idInventario;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idRetiro
     *
     * @param \UTN\Bundle\RetirosBundle\Entity\Retiro $idRetiro
     *
     * @return RetiroBody
     */
    public function setIdRetiro(\UTN\Bundle\RetirosBundle\Entity\Retiro $idRetiro = null)
    {
        $this->idRetiro = $idRetiro;

        return $this;
    }

    /**
     * Get idRetiro
     *
     * @return \UTN\Bundle\RetirosBundle\Entity\Retiro
     */
    public function getIdRetiro()
    {
        return $this->idRetiro;
    }

    /**
     * Set idInventario
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Inventario $idInventario
     *
     * @return RetiroBody
     */
    public function setIdInventario(\UTN\Bundle\DashboardMainBundle\Entity\Inventario $idInventario = null)
    {
        $this->idInventario = $idInventario;

        return $this;
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
}
