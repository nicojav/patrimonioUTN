<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cuenta
 *
 * @ORM\Table(name="cuenta")
 * @ORM\Entity
 */
class Cuenta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cod_cuenta", type="smallint", nullable=false)
     */
    private $codCuenta;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_cuenta", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCuenta;



    /**
     * Set codCuenta
     *
     * @param integer $codCuenta
     *
     * @return Cuenta
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Cuenta
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
     * Get idCuenta
     *
     * @return integer
     */
    public function getIdCuenta()
    {
        return $this->idCuenta;
    }
}
