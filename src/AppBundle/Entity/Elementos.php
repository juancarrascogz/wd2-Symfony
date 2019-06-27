<?php
namespace AppBundle\Entity;
date_default_timezone_set('Europe/Madrid');

use Doctrine\ORM\Mapping as ORM;

/** 
 *  @ORM\Entity(repositoryClass="AppBundle\Repository\ElementosRepository")
 *  @ORM\Table(name="catalogo_elementos")
 */
class Elementos {

    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(name="id_elemento", type="integer", nullable=false) */
    private $id_elemento;

    /** @ORM\Column(name="codigo_barras", type="string", length=45, nullable=false) */
    private $codigo_barras; 

    /** @ORM\Column(name="fecha_creacion", type="datetime", nullable=true) */
    private $fechaCreacion;

    /** @ORM\Column(name="fecha_modifcacion", type="datetime", nullable=true) */
    private $fechaModificacion;

    /** @ORM\Column(name="producto_id", type="integer", nullable=false) */
    private $producto_id;

    /** @ORM\Column(name="tiendas_id", type="integer", nullable=false) */
    private $tiendas_id;

    /** 
     * @ORM\ManyToOne(targetEntity="Producto", inversedBy="elementos")
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="producto_id") */
    private $producto;

    /** 
     * @ORM\ManyToOne(targetEntity="Tiendas", inversedBy="elementos")
     * @ORM\JoinColumn(name="tiendas_id", referencedColumnName="tiendas_id") */
    private $tienda;

   /**
     * Many Elementos have Many Carritos.
     * @ORM\ManyToMany(targetEntity="Carritos", mappedBy="elementos")
     */
    private $carritos;

    public function __construct() {
        $this->carritos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get the value of id_elemento
     */ 
    public function getIdElemento()
    {
        return $this->id_elemento;
    }

    /**
     * Set the value of id_elemento
     *
     * @return  self
     */ 
    public function setIdElemento($id_elemento)
    {
        $this->id_elemento = $id_elemento;

        return $this;
    }

    /**
     * Get the value of codigo_barras
     */ 
    public function getCodigoBarras()
    {
        return $this->codigo_barras;
    }

    /**
     * Set the value of codigo_barras
     *
     * @return  self
     */ 
    public function setCodigoBarras($codigo_barras)
    {
        $this->codigo_barras = $codigo_barras;

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
     * Get the value of producto_id
     */ 
    public function getProductoId()
    {
        return $this->producto_id;
    }

    /**
     * Set the value of producto_id
     *
     * @return  self
     */ 
    public function setProductoID($producto_id)
    {
        $this->producto_id = $producto_id;

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
     * Get the value of producto
     */ 
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set the value of producto
     *
     * @return  self
     */ 
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get the value of tienda
     */ 
    public function getTienda()
    {
        return $this->tienda;
    }

    /**
     * Set the value of tienda 
     *
     * @return  self
     */ 
    public function setTienda($tienda)
    {
        $this->tienda = $tienda;

        return $this;
    }

    /**
     * Get the value of carritos
     */ 
    public function getCarritos()
    {
        return $this->carritos;
    }

    /**
     * Set the value of carrito
     *
     * @return  self
     */ 
    public function setCarritos($carritos)
    {
        $this->carritos = $carritos;

        return $this;
    }

    /**
     * Set the value of carrito
     *
     * @return  self
     */ 
    public function addCarrito($carrito)
    {
        $this->carritos[] = $carrito;

        return $this;
    }

}