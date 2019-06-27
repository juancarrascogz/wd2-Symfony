<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CategoriasRepository extends EntityRepository {
    
    /**
     * Comprueba un id de producto y devuelve sus datos
     * 
     * @param string $id_catg  id_catg
     * 
     * @return array|null
     */
    function get_productos($id_catg) {

        $categoria = $this->find($id_catg);
        
        return $categoria->getProductos();
    } 
    /**
     * Comprobar si categoria ya esta registrada
     * 
     * @param integer $nombre             Nombre de categoria
     * 
     * @return boolean
     */
    function comprobar_categoria($nombre) {

        $em = $this->getEntityManager();
        $datos_categorias = $em->getRepository("AppBundle:Categorias")->findAll();
        
        foreach($datos_categorias as $d) :
            if( $d->getCategoria() == $nombre) {
                return true;
            } endforeach;

            return false;
    }
   

}
?>