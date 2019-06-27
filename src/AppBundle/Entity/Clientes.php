<?php
namespace AppBundle\Entity;
date_default_timezone_set('Europe/Madrid');

use Doctrine\ORM\Mapping as ORM;

/** 
 *  @ORM\Entity(repositoryClass="AppBundle\Repository\ClientesRepository")
 *  @ORM\Table(name="cliente_data")
 */
class Clientes {

    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(name="id_cliente", type="integer", nullable=false) */
    private $id_cliente;

    /** @ORM\Column(name="idUsuarios", type="integer", nullable=false) */
    private $idUsuarios;

    /** @ORM\Column(name="direccion_facturacion", type="string", length=45, nullable=false) */
    private $direccion_facturacion;    

    /** @ORM\Column(name="telefono", type="string", length=45, nullable=true) */
    private $telefono;

    /** @ORM\Column(name="saldo", type="float", length=45, nullable=false) */
    private $saldo;

    /** @ORM\Column(name="puntos", type="string", length=45, nullable=false) */
    private $puntos;

    /** @ORM\Column(name="tienda", type="integer", nullable=false) */
    private $tienda;

    /** 
     * @ORM\OneToOne(targetEntity="Usuarios", inversedBy="clientes")
     * @ORM\JoinColumn(name="idUsuarios", referencedColumnName="idUsuarios") */
    private $usuarios;

    /** 
     * @ORM\OneToMany(targetEntity="Carritos", mappedBy="clientes")
     */
    private $carritos;

    public function __construct()
    {
        $this->carritos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get the value of direccion_facturacion
     */ 
    public function getDireccion_facturacion()
    {
        return $this->direccion_facturacion;
    }

    /**
     * Set the value of direccion_facturacion
     *
     * @return  self
     */ 
    public function setDireccion_facturacion($direccion_facturacion)
    {
        $this->direccion_facturacion = $direccion_facturacion;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }


    /**
     * Get the value of saldo
     */ 
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set the value of saldo
     *
     * @return  self
     */ 
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get the value of puntos
     */ 
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set the value of puntos
     *
     * @return  self
     */ 
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

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
     * Get the value of carritos
     */ 
    public function getCarritos()
    {
        return $this->carritos;
    }

    /**
     * Set the value of carritos
     *
     * @return  self
     */ 
    public function addCarrito($carrito)
    {
        $this->carritos[] = $carrito;

        return $this;
    }



}
?>