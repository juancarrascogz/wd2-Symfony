<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TiendasRepository extends EntityRepository {
    
    /**
     * Coge todos los elementos de todas las tiendas y el stock de cada tienda.
     * 
     */
    public function datos_elementos_tiendas_get_all() {
        
        $DQL = "select t.tiendas_id, t.nombre, p.producto_id, p.name, p.ref, count(e.id_elemento) as stock
                from AppBundle:Tiendas t
                JOIN t.elementos e JOIN e.producto p 
                GROUP BY p.producto_id, t.tiendas_id";

        $query = $this->_em->createQuery($DQL);
        $productos = $query->getResult();  
        return $productos;
    }
    /**
     * Comprobar si tienda ya esta registrada
     * 
     * @param integer $nombre_tienda             Nombre de tienda
     * 
     * @return boolean
     */
    function comprobar_tienda($nombre_tienda) {

        $em = $this->getEntityManager();
        $datos_tiendas = $em->getRepository("AppBundle:Tiendas")->findAll();
        
        foreach($datos_tiendas as $d) :
            if( $d->getNombre() == $nombre_tienda) {
                return true;
            } endforeach;

        return false;
    }
    

}
?>