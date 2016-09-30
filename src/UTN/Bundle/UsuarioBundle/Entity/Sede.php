<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sede
 *
 * @ORM\Table(name="sede")
 * @ORM\Entity
 */
class Sede
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_sede", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSede;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Sede
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
     * Get idSede
     *
     * @return integer
     */
    public function getIdSede()
    {
        return $this->idSede;
    }
    /**
     * @var integer
     */
    private $codSede;


    /**
     * Set codSede
     *
     * @param integer $codSede
     *
     * @return Sede
     */
    public function setCodSede($codSede)
    {
        $this->codSede = $codSede;

        return $this;
    }

    /**
     * Get codSede
     *
     * @return integer
     */
    public function getCodSede()
    {
        return $this->codSede;
    }
}
