<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ElementosRepository extends EntityRepository
{
    public function elementosDisponibles($producto_id)
    {
        $DQL = "
            select e from AppBundle:Elementos e
                join e.producto p
            where 
                p.producto_id = '".$producto_id."'
                and e.id_elemento 
                NOT IN (
                    select el.id_elemento from AppBundle:Elementos el
                    join el.carritos c
                )
        ";

        $result = $this->_em->createQuery($DQL)->getResult();
        return $result;
    }
}