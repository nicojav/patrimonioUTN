<?php

namespace UTN\Bundle\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="IDX_2265B05D90F1D76D", columns={"id_rol"}), @ORM\Index(name="IDX_2265B05D72481BE2", columns={"id_usuario_superior"})})
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=50, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=200, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=100, nullable=true)
     */
    private $apellido;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_superior", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioSuperior;

    /**
     * @var \UTN\Bundle\UsuarioBundle\Entity\Rol
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\UsuarioBundle\Entity\Rol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rol", referencedColumnName="id_rol")
     * })
     */
    private $idRol;



    /**
     * Set usuario
     *
     * @param string $usuario
     *
     * @return Usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Usuario
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Usuario
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Get idUsuario
     *
     * @return integer
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idUsuarioSuperior
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuarioSuperior
     *
     * @return Usuario
     */
    public function setIdUsuarioSuperior(\UTN\Bundle\UsuarioBundle\Entity\Usuario $idUsuarioSuperior = null)
    {
        $this->idUsuarioSuperior = $idUsuarioSuperior;

        return $this;
    }

    /**
     * Get idUsuarioSuperior
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Usuario
     */
    public function getIdUsuarioSuperior()
    {
        return $this->idUsuarioSuperior;
    }

    /**
     * Set idRol
     *
     * @param \UTN\Bundle\UsuarioBundle\Entity\Rol $idRol
     *
     * @return Usuario
     */
    public function setIdRol(\UTN\Bundle\UsuarioBundle\Entity\Rol $idRol = null)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * Get idRol
     *
     * @return \UTN\Bundle\UsuarioBundle\Entity\Rol
     */
    public function getIdRol()
    {
        return $this->idRol;
    }



    /**
     * @return string
     */
    public function __toString()
    {
        return  $this->getUsuario() ?: "n/a";
    }




}
