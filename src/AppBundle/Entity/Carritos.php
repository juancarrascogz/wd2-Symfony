<?php
namespace AppBundle\Entity;
date_default_timezone_set('Europe/Madrid');

use Doctrine\ORM\Mapping as ORM;

/** 
 *  @ORM\Entity(repositoryClass="AppBundle\Repository\CarritosRepository")
 *  @ORM\Table(name="clientes_carritos")
 */
class Carritos {

    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(name="id_carrito", type="integer", nullable=false) */
    private $id_carrito;

    /** @ORM\Column(name="id_cliente", type="integer", nullable=false) */
    private $id_cliente;

    /** @ORM\Column(name="fecha_compra", type="datetime", nullable=true) */
    private $fecha_compra;

    /** @ORM\Column(name="fecha_creacion", type="datetime", nullable=false) */
    private $fecha_creacion;

    /** @ORM\Column(name="fecha_modificacion", type="datetime", nullable=false) */
    private $fecha_modificacion;

    /** @ORM\Column(name="estado", type="string", length=45, nullable=false) */
    private $estado;

    /** @ORM\Column(name="entregado", type="integer", nullable=false) */
    private $entregado;

    /** 
     * @ORM\ManyToOne(targetEntity="Clientes", inversedBy="carritos")
     * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id_cliente") */
    private $clientes;

    /**
     * Many Carritos have Many Elementos.
     * @ORM\ManyToMany(targetEntity="Elementos", inversedBy="carritos")
     * @ORM\JoinTable(name="carritos_has_elementos",
     *      joinColumns={@ORM\JoinColumn(name="id_carrito", referencedColumnName="id_carrito")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_elemento", referencedColumnName="id_elemento")}
     *      )
     */
    private $elementos;

    public function __construct() {
        $this->elementos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get the value of id_carrito
     */ 
    public function getIdCarrito()
    {
        return $this->id_carrito;
    }

    /**
     * Set the value of id_carrito
     *
     * @return  self
     */ 
    public function setIdCarrito($id_carrito)
    {
        $this->id_carrito = $id_carrito;

        return $this;
    }

    /**
     * Get the value of fecha_compra
     */ 
    public function getFechaCompra()
    {
        return $this->fecha_compra;
    }

    /**
     * Set the value of fecha_compra
     *
     * @return  self
     */ 
    public function setFechaCompra($fecha_compra)
    {
        $this->fecha_compra = $fecha_compra;

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
     * Get the value of id_cliente
     */ 
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * Set the value of id_cliente
     *
     * @return  self
     */ 
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of entregado
     */ 
    public function getEntregado()
    {
        return $this->entregado;
    }

    /**
     * Set the value of entregado
     *
     * @return  self
     */ 
    public function setEntregado($entregado)
    {
        $this->entregado = $entregado;

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
    public function setClientes($clientes)
    {
        $this->clientes = $clientes;

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
    public function setElementos($elementos)
    {
        $this->elementos = $elementos;

        return $this;
    }

    /** Add the value of elemento
    *
    * @return  self
    */ 
   public function addElemento($elemento)
   {
       $this->elementos[] = $elemento;

       return $this;
   }

    //-------------------------------------------

    public function getProductos()
    {
        $productos = [];
        foreach($this->elementos as $e) {
            $productos[] = $e->getProducto();
        }
        return $productos;
    }

}
?>