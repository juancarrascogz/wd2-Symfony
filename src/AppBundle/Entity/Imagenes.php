<?php

namespace AppBundle\Entity;
date_default_timezone_set('Europe/Madrid');

use Doctrine\ORM\Mapping as ORM;

/** 
 *  @ORM\Entity(repositoryClass="AppBundle\Repository\ImagenesRepository")
 *  @ORM\Table(name="imagenes_producto")
 */
class Imagenes {

    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(name="idimagenes_producto", type="integer", nullable=false) */
    private $idimagenes_producto;

    /** @ORM\Column @Column(name="producto_id", type="integer", nullable=false) */
    //private $producto_id;

    /** @ORM\Column(name="img_g", type="string", length=45, nullable=false) */
    private $img_g;

    /** @ORM\Column(name="img_1", type="string", nullable=false) */
    private $img_1;

    /** @ORM\Column(name="img_2", type="string", length=45, nullable=false) */
    private $img_2;
    
    /** @ORM\Column(name="img_3", type="string", length=45, nullable=false) */
    private $img_3;
    
    /** @ORM\Column(name="img_4", type="string", length=45, nullable=false) */
    private $img_4;
    
    /** @ORM\Column(name="tam", type="integer", nullable=false) */
    private $tam;

    /** 
     * @ORM\ManyToOne(targetEntity="Producto", inversedBy="images")
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="producto_id") */
    private $producto;


    /**
     * Get the value of idimagenes_producto
     */ 
    public function getIdimagenes_producto()
    {
        return $this->idimagenes_producto;
    }

    /**
     * Set the value of idimagenes_producto
     *
     * @return  self
     */ 
    public function setIdimagenes_producto($idimagenes_producto)
    {
        $this->idimagenes_producto = $idimagenes_producto;

        return $this;
    }

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
     * Get the value of img_g
     */ 
    public function getImg_g()
    {
        return $this->img_g;
    }

    /**
     * Set the value of img_g
     *
     * @return  self
     */ 
    public function setImg_g($img_g)
    {
        $this->img_g = $img_g;

        return $this;
    }

    /**
     * Get the value of img_1
     */ 
    public function getImg_1()
    {
        return $this->img_1;
    }

    /**
     * Set the value of img_1
     *
     * @return  self
     */ 
    public function setImg_1($img_1)
    {
        $this->img_1 = $img_1;

        return $this;
    }

    /**
     * Get the value of img_2
     */ 
    public function getImg_2()
    {
        return $this->img_2;
    }

    /**
     * Set the value of img_2
     *
     * @return  self
     */ 
    public function setImg_2($img_2)
    {
        $this->img_2 = $img_2;

        return $this;
    }

    /**
     * Get the value of img_3
     */ 
    public function getImg_3()
    {
        return $this->img_3;
    }

    /**
     * Set the value of img_3
     *
     * @return  self
     */ 
    public function setImg_3($img_3)
    {
        $this->img_3 = $img_3;

        return $this;
    }

    /**
     * Get the value of img_4
     */ 
    public function getImg_4()
    {
        return $this->img_4;
    }

    /**
     * Set the value of img_4
     *
     * @return  self
     */ 
    public function setImg_4($img_4)
    {
        $this->img_4 = $img_4;

        return $this;
    }

    /**
     * Get the value of tam
     */ 
    public function getTam()
    {
        return $this->tam;
    }

    /**
     * Set the value of tam 
     *
     * @return  self
     */ 
    public function setTam($tam)
    {
        $this->tam = $tam;

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
    
}
?>