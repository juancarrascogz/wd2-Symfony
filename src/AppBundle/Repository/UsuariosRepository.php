<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UsuariosRepository extends EntityRepository
{
    public function authenticate($email, $password) {

        $password = md5($password);

        $em = $this->getEntityManager();

        $user = $this->findOneBy(['email'=>$email]);
        if( $user ) {
            if( $user->getPassword()==$password ) {
                return $user;
            }
            else {
                return false;
            }
        }
        return null;
    }

    public function login_get_user_id($email) {
        
        $em = $this->getEntityManager();
        $usuarios = $em->getRepository("AppBundle:Usuarios")->findAll();
        foreach($usuarios as $u){
            if($u->getEmail() == $email){
                $cliente = $u;
            }
        }
        return $cliente->getDatosClientes()->getIdUsuarios();
    }

    public function login_get_empleado_id($email_empleado) {
        
        $em = $this->getEntityManager();
        $usuarios = $em->getRepository("AppBundle:Usuarios")->findAll();
        foreach($usuarios as $u){
            if($u->getEmail() == $email_empleado){
                $empleado = $u;
            }
        }
        return $empleado->getEmpleados()->getIdUsuarios();
    }


    public function comprobar_dni_email_clientes($dni, $email) {
        
        $em = $this->GetEntityManager(); 
        $usuarios = $em->getRepository("AppBundle:Usuarios")->findAll();
        $clientes = $em->getRepository("AppBundle:Clientes")->findAll();
        foreach($clientes as $c){
            if( $c->getUsuarios()->getDni() == $dni || $c->getUsuarios()->getEmail() == $email ){
                return true;
            }
        }
        return false;
    }

    public function comprobar_dni_email_empleados($dni, $email) {
        
        $em = $this->getEntityManager();
        $usuarios = $em->getRepository("AppBundle:Usuarios")->findAll();
        $empleados = $em->getRepository("AppBundle:Empleados")->findAll();
        foreach($empleados as $e){
            if( $e->getUsuarios()->getDni() == $dni || $e->getUsuarios()->getEmail() == $email ){
                return true;
            }
        }
        return false;
    }
    

}
?>