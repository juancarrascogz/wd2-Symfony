<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductoRepository extends EntityRepository
{
    /**
     * Comprobar si producto ya esta registrado
     * 
     * @param integer $nombre             Nombre de producto
     * 
     * @return boolean
     */
    function comprobar_producto($nombre) {

        $em = $this->getEntityManager();
        $categorias = $em->getRepository("AppBundle:Categorias")->findAll();
        $productos = $em->getRepository("AppBundle:Producto")->findAll();
        foreach($productos as $p){
            if( $p->getName() == $nombre ){
                return true;
            }
        }
        return false;
    }
}

