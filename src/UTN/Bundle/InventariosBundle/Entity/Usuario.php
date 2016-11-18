<?php

namespace UTN\Bundle\InventariosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="IDX_2265B05D90F1D76D", columns={"id_rol"}), @ORM\Index(name="IDX_2265B05D72481BE2", columns={"id_usuario_superior"}), @ORM\Index(name="IDX_2265B05D6DFF4765", columns={"id_area_patrimonio"})})
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=30, nullable=true)
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
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=30, nullable=true)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="legajo_personal", type="integer", nullable=true)
     */
    private $legajoPersonal;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

    /**
     * @var \UTN\Bundle\InventariosBundle\Entity\AreaPatrimonio
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\InventariosBundle\Entity\AreaPatrimonio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_area_patrimonio", referencedColumnName="id_area_patrimonio")
     * })
     */
    private $idAreaPatrimonio;

    /**
     * @var \UTN\Bundle\InventariosBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\InventariosBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_superior", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioSuperior;

    /**
     * @var \UTN\Bundle\InventariosBundle\Entity\Rol
     *
     * @ORM\ManyToOne(targetEntity="UTN\Bundle\InventariosBundle\Entity\Rol")
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
     * Set password
     *
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set legajoPersonal
     *
     * @param integer $legajoPersonal
     *
     * @return Usuario
     */
    public function setLegajoPersonal($legajoPersonal)
    {
        $this->legajoPersonal = $legajoPersonal;

        return $this;
    }

    /**
     * Get legajoPersonal
     *
     * @return integer
     */
    public function getLegajoPersonal()
    {
        return $this->legajoPersonal;
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
     * Set idAreaPatrimonio
     *
     * @param \UTN\Bundle\InventariosBundle\Entity\AreaPatrimonio $idAreaPatrimonio
     *
     * @return Usuario
     */
    public function setIdAreaPatrimonio(\UTN\Bundle\InventariosBundle\Entity\AreaPatrimonio $idAreaPatrimonio = null)
    {
        $this->idAreaPatrimonio = $idAreaPatrimonio;

        return $this;
    }

    /**
     * Get idAreaPatrimonio
     *
     * @return \UTN\Bundle\InventariosBundle\Entity\AreaPatrimonio
     */
    public function getIdAreaPatrimonio()
    {
        return $this->idAreaPatrimonio;
    }

    /**
     * Set idUsuarioSuperior
     *
     * @param \UTN\Bundle\InventariosBundle\Entity\Usuario $idUsuarioSuperior
     *
     * @return Usuario
     */
    public function setIdUsuarioSuperior(\UTN\Bundle\InventariosBundle\Entity\Usuario $idUsuarioSuperior = null)
    {
        $this->idUsuarioSuperior = $idUsuarioSuperior;

        return $this;
    }

    /**
     * Get idUsuarioSuperior
     *
     * @return \UTN\Bundle\InventariosBundle\Entity\Usuario
     */
    public function getIdUsuarioSuperior()
    {
        return $this->idUsuarioSuperior;
    }

    /**
     * Set idRol
     *
     * @param \UTN\Bundle\InventariosBundle\Entity\Rol $idRol
     *
     * @return Usuario
     */
    public function setIdRol(\UTN\Bundle\InventariosBundle\Entity\Rol $idRol = null)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * Get idRol
     *
     * @return \UTN\Bundle\InventariosBundle\Entity\Rol
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    public function __toString()
    {
        return  $this->getUsuario() ?: "n/a";
    }


    public function find($id)
    {
        $query = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.idUsuario = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $query->getSingleResult();
    }

    /**
     * Get idSuperior
     *
     * @return \UTN\Bundle\InventariosBundle\Entity\Usuario
     */
    public function getIdSuperior()
    {
        if (is_null($this->idUsuarioSuperior)){
            return $this->idUsuario;
        }
        else
        {
            return $this->idUsuarioSuperior;

        }
    }

}
