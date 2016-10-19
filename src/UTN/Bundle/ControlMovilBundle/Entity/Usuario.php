<?php

namespace UTN\Bundle\ControlMovilBundle\Entity;

/**
 * Usuario
 */
class Usuario
{
    /**
     * @var string
     */
    private $usuario;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellido;

    /**
     * @var integer
     */
    private $idUsuario;

    /**
     * @var \UTN\Bundle\ControlMovilBundle\Entity\Usuario
     */
    private $idUsuarioSuperior;

    /**
     * @var \UTN\Bundle\ControlMovilBundle\Entity\Rol
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
     * @param \UTN\Bundle\ControlMovilBundle\Entity\Usuario $idUsuarioSuperior
     *
     * @return Usuario
     */
    public function setIdUsuarioSuperior(\UTN\Bundle\ControlMovilBundle\Entity\Usuario $idUsuarioSuperior = null)
    {
        $this->idUsuarioSuperior = $idUsuarioSuperior;

        return $this;
    }

    /**
     * Get idUsuarioSuperior
     *
     * @return \UTN\Bundle\ControlMovilBundle\Entity\Usuario
     */
    public function getIdUsuarioSuperior()
    {
        return $this->idUsuarioSuperior;
    }

    /**
     * Set idRol
     *
     * @param \UTN\Bundle\ControlMovilBundle\Entity\Rol $idRol
     *
     * @return Usuario
     */
    public function setIdRol(\UTN\Bundle\ControlMovilBundle\Entity\Rol $idRol = null)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * Get idRol
     *
     * @return \UTN\Bundle\ControlMovilBundle\Entity\Rol
     */
    public function getIdRol()
    {
        return $this->idRol;
    }
}

