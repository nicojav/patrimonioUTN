<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoTransferencia
 *
 * @ORM\Table(name="estado_transferencia")
 * @ORM\Entity
 */
class EstadoTransferencia
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
     * @ORM\Column(name="id_estado_transferencia", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstadoTransferencia;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return EstadoTransferencia
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
     * Get idEstadoTransferencia
     *
     * @return integer
     */
    public function getIdEstadoTransferencia()
    {
        return $this->idEstadoTransferencia;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return 'estadoTransferencia';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return  $this->getName() ?: "n/a";
    }



}
