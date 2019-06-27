<?php
namespace AppBundle\Entity;
date_default_timezone_set('Europe/Madrid');

use Doctrine\ORM\Mapping as ORM;

/** 
 *  @ORM\Entity(repositoryClass="AppBundle\Repository\ProductoRepository")
 *  @ORM\Table(name="catalogo_productos")
 */
class Producto {
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(name="producto_id", type="integer", nullable=false) */
    private $producto_id;

    /** @ORM\Column(name="name", type="string", length=45, nullable=false) */
    private $name;

    /** @ORM\Column(name="precio", type="float", nullable=false) */
    private $precio;

    /** @ORM\Column(name="fecha_creacion", type="datetime", nullable=false) */
    private $fechaCreacion;

    /** @ORM\Column(name="fecha_modiifcacion", type="datetime", nullable=false) */
    private $fechaModificacion;

    /** @ORM\Column(name="id_catg", type="integer", nullable=false) */
    private $id_catg;

    /** @ORM\Column(name="descripcion", type="string", length=45, nullable=false) */
    private $descripcion;

    /** @ORM\Column(name="valoracion", type="string", length=45, nullable=false) */
    private $valoracion;

    /** @ORM\Column(name="ref", type="string", length=45, nullable=false) */
    private $ref;

    /** @ORM\Column(name="fabricante", type="string", length=45, nullable=false) */
    private $fabricante;

    /** @ORM\Column(name="destacados", type="integer", nullable=false) */
    private $destacados;

    /** @ORM\Column(name="promocion", type="integer", nullable=false) */
    private $promocion;

    /** @ORM\Column(name="acronimo", type="string", length=45, nullable=false) */
    private $acronimo;



    /** 
     * @ORM\OneToMany(targetEntity="Imagenes", mappedBy="producto")
     */
    private $images;

    /** 
     * @ORM\OneToMany(targetEntity="Elementos", mappedBy="producto")
     */
    private $elementos;
   
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->elementos = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /** 
     * @ORM\ManyToOne(targetEntity="Categorias", inversedBy="productos")
     * @ORM\JoinColumn(name="id_catg", referencedColumnName="id_catg") */
    private $categorias;


    /**
     * Get the value of producto_id
     */ 
    public function getProducto_id()
    {
        return $this->producto_id;
    }

    /**
     * Set the value of producto_id
     *
     * @return  self
     */ 
    public function setProducto_id($producto_id)
    {
        $this->producto_id = $producto_id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

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
     * Get the value of id_catg
     */ 
    public function getId_catg()
    {
        return $this->id_catg;
    }

    /**
     * Set the value of id_catg
     *
     * @return  self
     */ 
    public function setId_catg($id_catg)
    {
        $this->id_catg = $id_catg;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of valoracion
     */ 
    public function getValoracion()
    {
        return $this->valoracion;
    }

    /**
     * Set the value of valoracion
     *
     * @return  self
     */ 
    public function setValoracion($valoracion)
    {
        $this->valoracion = $valoracion;

        return $this;
    }

    /**
     * Get the value of ref
     */ 
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set the value of ref
     *
     * @return  self
     */ 
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get the value of fabricante
     */ 
    public function getFabricante()
    {
        return $this->fabricante;
    }

    /**
     * Set the value of fabricante
     *
     * @return  self
     */ 
    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;

        return $this;
    }

    /**
     * Get the value of destacados
     */ 
    public function getDestacados()
    {
        return $this->destacados;
    }

    /**
     * Set the value of destacados
     *
     * @return  self
     */ 
    public function setDestacados($destacados)
    {
        $this->destacados = $destacados;

        return $this;
    }

    /**
     * Get the value of promocion
     */ 
    public function getPromocion()
    {
        return $this->promocion;
    }

    /**
     * Set the value of promocion
     *
     * @return  self
     */ 
    public function setPromocion($promocion)
    {
        $this->promocion = $promocion;

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
     * Get the value of images
     */ 
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set the value of images
     *
     * @return  self
     */ 
    public function addImage($image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Get the value of elementos
     */ 
    public function getElementos()
    {
        return $this->elementos;
    }

    /**
     * Set the value of elementos
     *
     * @return  self
     */ 
    public function addElemento($elementos)
    {
        $this->elementos[] = $elementos;

        return $this;
    }

    /**
     * Get the value of tam
     */ 
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * Set the value of tam 
     *
     * @return  self
     */ 
    public function setCategorias($categorias)
    {
        $this->categorias = $categorias;

        return $this;
    }

}