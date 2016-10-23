<?php

namespace UTN\Bundle\DashboardMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aula
 *
 * @ORM\Table(name="aula", indexes={@ORM\Index(name="IDX_31990A4A1BBFED3", columns={"id_sede"})})
 * @ORM\Entity
 */
class Aula
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
     * @ORM\Column(name="id_aula", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAula;

    /**
     * @var \UTN\Bundle\DashboardMainBundle\Entity\Sede
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\DashboardMainBundle\Entity\Sede")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sede", referencedColumnName="id_sede")
     * })
     */
    private $idSede;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Aula
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
     * Get idAula
     *
     * @return integer 
     */
    public function getIdAula()
    {
        return $this->idAula;
    }

    /**
     * Set idSede
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Sede $idSede
     * @return Aula
     */
    public function setIdSede(\UTN\Bundle\DashboardMainBundle\Entity\Sede $idSede = null)
    {
        $this->idSede = $idSede;

        return $this;
    }

    /**
     * Get idSede
     *
     * @return \UTN\Bundle\DashboardMainBundle\Entity\Sede 
     */
    public function getIdSede()
    {
        return $this->idSede;
    }

}
