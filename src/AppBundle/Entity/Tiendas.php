<?php
namespace AppBundle\Entity;
date_default_timezone_set('Europe/Madrid');

use Doctrine\ORM\Mapping as ORM;

/** 
 *  @ORM\Entity(repositoryClass="AppBundle\Repository\TiendasRepository")
 *  @ORM\Table(name="tiendas")
 */
class Tiendas {
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(name="tiendas_id", type="integer", nullable=false) */
    private $tiendas_id;

    /** @ORM\Column(name="nombre", type="string", length=45, nullable=false) */
    private $nombre;

    /** @ORM\Column(name="href", type="string", length=45, nullable=false) */
    private $href;    

    /** @ORM\Column(name="img", type="string", length=45, nullable=false) */
    private $img;

    /** @ORM\Column(name="calle", type="string", length=45, nullable=false) */
    private $calle;

    /** @ORM\Column(name="tel", type="string", length=45, nullable=false) */
    private $tel;

    /** @ORM\Column(name="email", type="string", length=45, nullable=false) */
    private $email;

    /** @ORM\Column(name="responsable", type="string", length=45, nullable=false) */
    private $responsable;

    /** @ORM\Column(name="visible", type="string", length=45, nullable=true) */
    private $visible;


    /** 
     * @ORM\OneToMany(targetEntity="Elementos", mappedBy="tienda")
     */
    private $elementos;
   
    public function __construct()
    {
        $this->elementos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get the value of tiendas_id
     */ 
    public function getTiendas_id()
    {
        return $this->tiendas_id;
    }

    /**
     * Set the value of producto_id
     *
     * @return  self
     */ 
    public function setTiendas_id($tiendas_id)
    {
        $this->tiendas_id = $tiendas_id;

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
     * Set the value of name
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of href
     */ 
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Set the value of href
     *
     * @return  self
     */ 
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of calle
     */ 
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set the value of calle
     *
     * @return  self
     */ 
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

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
     * Get the value of responsable
     */ 
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set the value of responsable
     *
     * @return  self
     */ 
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

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
}
?>