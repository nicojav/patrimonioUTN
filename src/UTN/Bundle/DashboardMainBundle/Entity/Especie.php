<?php

namespace UTN\Bundle\DashboardMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Especie
 *
 * @ORM\Table(name="especie", uniqueConstraints={@ORM\UniqueConstraint(name="UK_especie", columns={"cod_cuenta", "cod_especie", "cod_sub_especie"})}, indexes={@ORM\Index(name="IDX_FF0814ED17F00A22", columns={"id_cuenta"})})
 * @ORM\Entity
 */
class Especie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cod_cuenta", type="smallint", nullable=false)
     */
    private $codCuenta;

    /**
     * @var integer
     *
     * @ORM\Column(name="cod_especie", type="integer", nullable=false)
     */
    private $codEspecie;

    /**
     * @var integer
     *
     * @ORM\Column(name="cod_sub_especie", type="smallint", nullable=false)
     */
    private $codSubEspecie;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_especie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEspecie;

    /**
     * @var \UTN\Bundle\DashboardMainBundle\Entity\Cuenta
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\DashboardMain\Entity\Cuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cuenta", referencedColumnName="id_cuenta")
     * })
     */
    private $idCuenta;



    /**
     * Set codCuenta
     *
     * @param integer $codCuenta
     *
     * @return Especie
     */
    public function setCodCuenta($codCuenta)
    {
        $this->codCuenta = $codCuenta;

        return $this;
    }

    /**
     * Get codCuenta
     *
     * @return integer
     */
    public function getCodCuenta()
    {
        return $this->codCuenta;
    }

    /**
     * Set codEspecie
     *
     * @param integer $codEspecie
     *
     * @return Especie
     */
    public function setCodEspecie($codEspecie)
    {
        $this->codEspecie = $codEspecie;

        return $this;
    }

    /**
     * Get codEspecie
     *
     * @return integer
     */
    public function getCodEspecie()
    {
        return $this->codEspecie;
    }

    /**
     * Set codSubEspecie
     *
     * @param integer $codSubEspecie
     *
     * @return Especie
     */
    public function setCodSubEspecie($codSubEspecie)
    {
        $this->codSubEspecie = $codSubEspecie;

        return $this;
    }

    /**
     * Get codSubEspecie
     *
     * @return integer
     */
    public function getCodSubEspecie()
    {
        return $this->codSubEspecie;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Especie
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
     * Get idEspecie
     *
     * @return integer
     */
    public function getIdEspecie()
    {
        return $this->idEspecie;
    }

    /**
     * Set idCuenta
     *
     * @param \UTN\Bundle\DashboardMainBundle\Entity\Cuenta $idCuenta
     *
     * @return Especie
     */
    public function setIdCuenta(\UTN\Bundle\DashboardMainBundle\Entity\Cuenta $idCuenta = null)
    {
        $this->idCuenta = $idCuenta;

        return $this;
    }

    /**
     * Get idCuenta
     *
     * @return \UTN\Bundle\DashboardMainBundle\Entity\Cuenta
     */
    public function getIdCuenta()
    {
        return $this->idCuenta;
    }
}
