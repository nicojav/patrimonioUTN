<?php

namespace UTN\Bundle\InventariosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AreaPatrimonio
 *
 * @ORM\Table(name="area_patrimonio")
 * @ORM\Entity
 */
class AreaPatrimonio
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_area_patrimonio", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAreaPatrimonio;



    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return AreaPatrimonio
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
     * Get idAreaPatrimonio
     *
     * @return integer
     */
    public function getIdAreaPatrimonio()
    {
        return $this->idAreaPatrimonio;
    }
}
