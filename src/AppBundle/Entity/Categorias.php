<?php

namespace AppBundle\Entity;
date_default_timezone_set('Europe/Madrid');

use Doctrine\ORM\Mapping as ORM;

/** 
 *  @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriasRepository")
 *  @ORM\Table(name="catalogo_categorias")
 */
class Categorias {
    
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(name="id_catg", type="integer", nullable=false) */
    private $id_catg;

    /** @ORM\Column(name="categoria", type="string", length=45, nullable=true) */
    private $categoria;

    /** @ORM\Column(name="fecha_creacion", type="datetime", nullable=false) */
    private $fechaCreacion;

    /** @ORM\Column(name="fecha_modificacion", type="datetime", nullable=false) */
    private $fechaModificacion;

    /** @ORM\Column(name="acronimo", type="string", length=45, nullable=true) */
    private $acronimo;

    /** @ORM\Column(name="descripcion", type="string", length=45, nullable=true) */
    private $descripcion;  

    /** @ORM\Column(name="visible", type="string", length=45, nullable=true) */
    private $visible;


    /** 
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="categorias")
     */
    private $productos;


    public function __construct()
    {
        $this->productos = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get the value of id_catg
     */ 
    public function getIdCatg()
    {
        return $this->id_catg;
    }

    /**
     * Set the value of id_catg
     *
     * @return  self
     */ 
    public function setIdCatg($id_catg)
    {
        $this->id_catg = $id_catg;

        return $this;
    }

    /**
     * Get the value of categoria (nombre)
     */ 
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria (nombre)
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get the value of fechaCreacion
     */ 
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set the value of fechaCreacion
     *
     * @return  self
     */ 
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get the value of fechaModificacion
     */ 
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * Set the value of fechaModificacion
     *
     * @return  self
     */ 
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;

        return $this;
    }

    /**
     * Get the value of acronimo
     */ 
    public function getAcronimo()
    {
        return $this->acronimo;
    }

    /**
     * Set the value of acronimo
     *
     * @return  self
     */ 
    public function setAcronimo($acronimo)
    {
        $this->acronimo = $acronimo;

        return $this;
    }

    /**
     * Get the value of fechaModificacion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of fechaModificacion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of visible
     */ 
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set the value of visible
     *
     * @return  self
     */ 
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }


    /**
     * Get the value of productos
     */ 
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Set the value of productos
     *
     * @return  self
     */ 
    public function addProducto($productos)
    {
        $this->productos[] = $productos;

        return $this;
    }


}
?>