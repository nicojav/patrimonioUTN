<?php

namespace UTN\Bundle\InventariosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aula
 *
 * @ORM\Table(name="aula", uniqueConstraints={@ORM\UniqueConstraint(name="UK_aula", columns={"cod_aula"})}, indexes={@ORM\Index(name="IDX_31990A4A1BBFED3", columns={"id_sede"})})
 * @ORM\Entity
 */
class Aula
{
    /**
     * @var string
     *
     * @ORM\Column(name="cod_aula", type="string", length=10, nullable=true)
     */
    private $codAula;

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
     * @var \UTN\Bundle\InventariosBundle\Entity\Sede
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\InventariosBundle\Entity\Sede")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sede", referencedColumnName="id_sede")
     * })
     */
    private $idSede;



    /**
     * Set codAula
     *
     * @param string $codAula
     *
     * @return Aula
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
     * Set descripcion
     *
     * @param string $descripcion
     *
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
     * @param \UTN\Bundle\InventariosBundle\Entity\Sede $idSede
     *
     * @return Aula
     */
    public function setIdSede(\UTN\Bundle\InventariosBundle\Entity\Sede $idSede = null)
    {
        $this->idSede = $idSede;

        return $this;
    }

    /**
     * Get idSede
     *
     * @return \UTN\Bundle\InventariosBundle\Entity\Sede
     */
    public function getIdSede()
    {
        return $this->idSede;
    }

    public function __toString()
    {
        return  $this->getDescripcion() ?: "n/a";
    }
}
