<?php
namespace AppBundle\Entity;
date_default_timezone_set('Europe/Madrid');

use Doctrine\ORM\Mapping as ORM;

/** 
 *  @ORM\Entity(repositoryClass="AppBundle\Repository\UsuariosRepository")
 *  @ORM\Table(name="Usuarios")
 */
class Usuarios {
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(name="idUsuarios", type="integer", nullable=false) */
    private $idUsuarios;

    /** @ORM\Column(name="is_empleado", type="integer", nullable=false) */
    private $is_empleado;

    /** @ORM\Column(name="nombre", type="string", length=45, nullable=false) */
    private $nombre;    

    /** @ORM\Column(name="apellidos", type="string", length=45, nullable=true) */
    private $apellidos;

    /** @ORM\Column(name="password", type="string", length=45, nullable=false) */
    private $password;

    /** @ORM\Column(name="fecha_creacion", type="datetime", nullable=false) */
    private $fecha_creacion;

    /** @ORM\Column(name="fecha_modificacion", type="datetime", nullable=false) */
    private $fecha_modificacion;

    /** @ORM\Column(name="username", type="string", length=45, nullable=false) */
    private $username;

    /** @ORM\Column(name="dni", type="string", length=45, nullable=false) */
    private $dni;

    /** @ORM\Column(name="email", type="string", length=45, nullable=false) */
    private $email;

    /** 
     * @ORM\OneToOne(targetEntity="Clientes", mappedBy="usuarios")
     */
    private $clientes;

    /** 
     * @ORM\OneToOne(targetEntity="Empleados", mappedBy="usuarios")
     */
    private $empleados;
   

    public function __construct()
    {
        
    }

    /**
     * Get the value of idUsuarios
     */ 
    public function getIdUsuarios()
    {
        return $this->idUsuarios;
    }

    /**
     * Set the value of idUsuarios
     *
     * @return  self
     */ 
    public function setIdUsuarios($idUsuarios)
    {
        $this->idUsuarios = $idUsuarios;

        return $this;
    }

    /**
     * Get the value of is_empleado
     */ 
    public function getIsEmpleado()
    {
        return $this->is_empleado;
    }

    /**
     * Set the value of is_empleado
     *
     * @return  self
     */ 
    public function setIsEmpleado($is_empleado)
    {
        $this->is_empleado = $is_empleado;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of fecha_creacion
     */ 
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * Set the value of fecha_creacion
     *
     * @return  self
     */ 
    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }

    /**
     * Get the value of fecha_modificacion
     */ 
    public function getFechaModificacion()
    {
        return $this->fecha_modificacion;
    }

    /**
     * Set the value of fecha_modificacion
     *
     * @return  self
     */ 
    public function setFechaModificacion($fecha_modificacion)
    {
        $this->fecha_modificacion = $fecha_modificacion;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of clientes
     */ 
    public function getDatosClientes()
    {
        return $this->clientes;
    }

    /**
     * Set the value of clientes
     *
     * @return  self
     */ 
    public function addDatosCliente($clientes)
    {
        $this->clientes = $clientes;

        return $this;
    }

    /**
     * Get the value of empleados
     */ 
    public function getEmpleados()
    {
        return $this->empleados;
    }

    /**
     * Set the value of empleados
     *
     * @return  self
     */ 
    public function addEmpleado($empleados)
    {
        $this->empleados = $empleados;

        return $this;
    }

}
?>