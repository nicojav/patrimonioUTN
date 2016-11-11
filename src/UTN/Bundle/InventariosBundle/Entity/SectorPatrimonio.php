<?php

namespace UTN\Bundle\InventariosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SectorPatrimonio
 *
 * @ORM\Table(name="sector_patrimonio", indexes={@ORM\Index(name="IDX_FF3610DC5CB4216A", columns={"id_area"})})
 * @ORM\Entity
 */
class SectorPatrimonio
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=40, nullable=true)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="legajo_personal", type="integer", nullable=true)
     */
    private $legajoPersonal;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_sector_patrimonio", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSectorPatrimonio;

    /**
     * @var \UTN\Bundle\InventariosBundle\Entity\AreaPatrimonio
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\InventariosBundle\Entity\AreaPatrimonio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_area", referencedColumnName="id_area_patrimonio")
     * })
     */
    private $idArea;



    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return SectorPatrimonio
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set legajoPersonal
     *
     * @param integer $legajoPersonal
     *
     * @return SectorPatrimonio
     */
    public function setLegajoPersonal($legajoPersonal)
    {
        $this->legajoPersonal = $legajoPersonal;

        return $this;
    }

    /**
     * Get legajoPersonal
     *
     * @return integer
     */
    public function getLegajoPersonal()
    {
        return $this->legajoPersonal;
    }

    /**
     * Get idSectorPatrimonio
     *
     * @return integer
     */
    public function getIdSectorPatrimonio()
    {
        return $this->idSectorPatrimonio;
    }

    /**
     * Set idArea
     *
     * @param \UTN\Bundle\InventariosBundle\Entity\AreaPatrimonio $idArea
     *
     * @return SectorPatrimonio
     */
    public function setIdArea(\UTN\Bundle\InventariosBundle\Entity\AreaPatrimonio $idArea = null)
    {
        $this->idArea = $idArea;

        return $this;
    }

    /**
     * Get idArea
     *
     * @return \UTN\Bundle\InventariosBundle\Entity\AreaPatrimonio
     */
    public function getIdArea()
    {
        return $this->idArea;
    }
    public function __toString()
    {
        return  $this->getNombre() ?: "n/a";
    }
}
