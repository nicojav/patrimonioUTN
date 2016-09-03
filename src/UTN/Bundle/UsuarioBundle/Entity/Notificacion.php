<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notificacion
 *
 * @ORM\Table(name="notificacion", indexes={@ORM\Index(name="IDX_729A19EC118E2735", columns={"id_usuario_destino"})})
 * @ORM\Entity
 */
class Notificacion
{
    /**
     * @var string
     *
     * @ORM\Column(name="mensaje", type="string", length=1000, nullable=true)
     */
    private $mensaje;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_notificacion", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNotificacion;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_destino", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioDestino;



    /**
     * Set mensaje
     *
     * @param string $mensaje
     *
     * @return Notificacion
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Get idNotificacion
     *
     * @return integer
     */
    public function getIdNotificacion()
    {
        return $this->idNotificacion;
    }

    /**
     * Set idUsuarioDestino
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuarioDestino
     *
     * @return Notificacion
     */
    public function setIdUsuarioDestino(\UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuarioDestino = null)
    {
        $this->idUsuarioDestino = $idUsuarioDestino;

        return $this;
    }

    /**
     * Get idUsuarioDestino
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Usuario
     */
    public function getIdUsuarioDestino()
    {
        return $this->idUsuarioDestino;
    }
}
