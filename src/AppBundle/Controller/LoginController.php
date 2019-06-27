<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginView(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository("AppBundle:Categorias")->findAll();
    
        $session = $this->get('session');
        $carrito = false;
        $loged=false;
        $admin=false;
        if( $session->has('is_logged_client') && $session->get('is_logged_client')==true ) {
            $carrito = true;
            $loged = true;
        }
        else if( $session->has('is_logged_emp') && $session->get('is_logged_emp')==true ){
            $loged = true;
        }
        else if( $session->has('is_logged_admin') && $session->get('is_logged_admin')==true ){
            $loged = true;
            $admin = true;
        }
        return $this->render('default/login.html.twig', ['categorias'=>$categorias,
                                                         'loged'=>$loged,
                                                         'carrito'=>$carrito,
                                                         'admin'=>$admin
        ]);

    }

    /**
     * @Route("/login", name="login", methods={"GET"})
     */    
    public function loginAction(Request $request)
    {
        $message = null;
        if( $request->query->has('error') && $request->query->get('error')==1 ) {   // $_GET['error']
            return $this->redirectToRoute('error');
        }
        if( $request->query->has('error') && $request->query->get('error')==2 ) {   // $_GET['error']
            return $this->redirectToRoute('error');
        }

        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository("AppBundle:Categorias")->findAll();
        
        $session = $this->get('session');
        $carrito = false;
        $loged=false;
        $admin=false;
        if( $session->has('is_logged_client') && $session->get('is_logged_client')==true ) {
            $carrito = true;
            $loged = true;
        }
        else if( $session->has('is_logged_emp') && $session->get('is_logged_emp')==true ){
            $loged = true;
        }
        else if( $session->has('is_logged_admin') && $session->get('is_logged_admin')==true ){
            $loged = true;
            $admin = true;
        }
        
        
        return $this->render('default/login.html.twig', ['msg'=>$message,
                                                         'categorias'=>$categorias,
                                                         'loged'=>$loged,
                                                         'carrito'=>$carrito,
                                                         'admin'=>$admin
        ]);
    }

    /**
     * @Route("/login", name="login_post", methods={"POST"})
     */    
    public function loginPostAction(Request $request, SessionInterface $session)
    {
        $em = $this->getDoctrine()->getManager();
        $empleado=false;

        $email = $request->request->get('email');
        if($email==null){
            $email = $request->request->get('email_empleado');
            $empleado=true;
        }
        $password = $request->request->get('password');
        if($password==null){
            $password = $request->request->get('password2');
        }

        $user = $em->getRepository('AppBundle:Usuarios')->authenticate($email, $password);
        
        if( $user ) {
            // Login con exito
            $session = new Session();
            $session->set('user', $user);

            if($empleado){
                if($user->getIdUsuarios() == 1){
                    $session->set('is_logged_admin', true);
                    return $this->redirectToRoute('areaAdministracion');
                }
                else{
                    $session->set('is_logged_emp', true);
                    return $this->redirectToRoute('areaEmpleado');
                }
                
            }
            else{
                $client = $user->getDatosClientes()->getIdCliente();
                $session->set('is_logged_client', true);
                return $this->redirectToRoute('areaCliente');   // Redireccion interna
            }
            
        }
        else if( $user===false ) {
            // Contraseña incorrecta
            return $this->redirectToRoute('login',['error'=>2]);
        }
        else if( $user===null ) {
            // Usuario no existe
            return $this->redirectToRoute('login',['error'=>1]);
        }
        
    }
    /**
     * @Route("/logout", name="logout")
     */    
    public function logoutAction(Request $request, SessionInterface $session)
    {
        
        $session->invalidate();
        
        return $this->redirectToRoute('login');
    }

}
