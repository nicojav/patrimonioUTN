<?php

namespace UTN\Bundle\RfidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sensor
 *
 * @ORM\Table(name="sensor")
 * @ORM\Entity
 */
class Sensor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sensor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSensor;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=30, nullable=false)
     */
    private $descripcion;



    /**
     * Get idSensor
     *
     * @return integer
     */
    public function getIdSensor()
    {
        return $this->idSensor;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Sensor
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


}
