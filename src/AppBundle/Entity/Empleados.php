<?php
namespace AppBundle\Entity;
date_default_timezone_set('Europe/Madrid');

use Doctrine\ORM\Mapping as ORM;

/** 
 *  @ORM\Entity(repositoryClass="AppBundle\Repository\EmpleadosRepository")
 *  @ORM\Table(name="empleado_data")
 */
class Empleados {
    
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(name="num_empleado", type="integer", nullable=false) */
    private $num_empleado;

    /** @ORM\Column(name="idUsuarios", type="integer", nullable=false) */
    private $idUsuarios;

    /** @ORM\Column(name="tiendas_id", type="integer", nullable=true) */
    private $tiendas_id;    

    /** @ORM\Column(name="cargo", type="string", length=45, nullable=true) */
    private $cargo;

    /** @ORM\Column(name="activo", type="integer", nullable=false) */
    private $activo;

    /** @ORM\Column(name="foto_id", type="string", length=300, nullable=true) */
    private $foto_id;

    /** @ORM\Column(name="foto_nombre", type="string", length=300, nullable=true) */
    private $foto_nombre;

    /** @ORM\Column(name="foto_tipo", type="string", length=300, nullable=true) */
    private $foto_tipo;

    /** @ORM\Column(name="foto_size", type="integer", nullable=true) */
    private $foto_size;

    /** @ORM\Column(name="foto_path", type="string", length=300, nullable=true) */
    private $foto_path;


    /** 
     * @ORM\OneToOne(targetEntity="Usuarios", inversedBy="empleados")
     * @ORM\JoinColumn(name="idUsuarios", referencedColumnName="idUsuarios") */
    private $usuarios;


    /**
     * Get the value of num_empleado
     */ 
    public function getNumEmpleado()
    {
        return $this->num_empleado;
    }

    /**
     * Set the value of num_empleado
     *
     * @return  self
     */ 
    public function setNumEmpleado($num_empleado)
    {
        $this->num_empleado = $num_empleado;

        return $this;
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
     * Get the value of tiendas_id
     */ 
    public function getTiendasId()
    {
        return $this->tiendas_id;
    }

    /**
     * Set the value of tiendas_id
     *
     * @return  self
     */ 
    public function setTiendasId($tiendas_id)
    {
        $this->tiendas_id = $tiendas_id;

        return $this;
    }

    /**
     * Get the value of cargo
     */ 
    public function getCargo()
    {
        return $this->cargo;
    }
    /**
     * Set the value of cargo
     *
     * @return  self
     */ 
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }
    /**
     * Get the value of activo
     */ 
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of activo
     *
     * @return  self
     */ 
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get the value of foto_id
     */ 
    public function getFotoId()
    {
        return $this->foto_id;
    }

    /**
     * Set the value of foto_id
     *
     * @return  self
     */ 
    public function setFotoId($foto_id)
    {
        $this->foto_id = $foto_id;

        return $this;
    }

    /**
     * Get the value of foto_nombre
     */ 
    public function getFotoNombre()
    {
        return $this->foto_nombre;
    }

    /**
     * Set the value of foto_nombre
     *
     * @return  self
     */ 
    public function setFotoNombre($foto_nombre)
    {
        $this->foto_nombre = $foto_nombre;

        return $this;
    }

    /**
     * Get the value of foto_tipo
     */ 
    public function getFotoTipo()
    {
        return $this->foto_tipo;
    }

    /**
     * Set the value of foto_tipo
     *
     * @return  self
     */ 
    public function setFotoTipo($foto_tipo)
    {
        $this->foto_tipo = $foto_tipo;

        return $this;
    }

    /**
     * Get the value of foto_size
     */ 
    public function getFotoSize()
    {
        return $this->foto_size;
    }

    /**
     * Set the value of foto_size
     *
     * @return  self
     */ 
    public function setFotoSize($foto_size)
    {
        $this->foto_size = $foto_size;

        return $this;
    }
    /**
     * Get the value of foto_path
     */ 
    public function getFotoPath()
    {
        return $this->foto_path;
    }

    /**
     * Set the value of foto_path
     *
     * @return  self
     */ 
    public function setFotoPath($foto_path)
    {
        $this->foto_path = $foto_path;

        return $this;
    }
    /**
     * Get the value of usuarios
     */ 
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * Set the value of usuarios 
     *
     * @return  self
     */ 
    public function setUsuarios($usuarios)
    {
        $this->usuarios = $usuarios;

        return $this;
    }

}
?>