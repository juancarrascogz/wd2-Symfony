<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        //return $this->render('default/index.html.twig', [
        //    'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        //]);
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository("AppBundle:Categorias")->findAll();
        $productos = $em->getRepository("AppBundle:Producto")->findAll();

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
        

        return $this->render('default/index.html.twig', ['categorias'=>$categorias,
                                                         'productos'=>$productos,
                                                         'loged'=>$loged,
                                                         'carrito'=>$carrito,
                                                         'admin'=>$admin
        ]);

    }
    /**
     * @Route("/categoria/{id_catg}", name="categoria", requirements={"id_catg": "\d+"})
     */
    public function categoriaView(Request $request, $id_catg)
    {

        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository("AppBundle:Categorias")->findAll();
        $categoria = $em->getRepository("AppBundle:Categorias")->find($id_catg);
        $productos = $em->getRepository("AppBundle:Producto")->findBy(['id_catg'=>$id_catg]);

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


        return $this->render('default/categoria.html.twig', ['categorias'=>$categorias,
                                                            'categoria'=>$categoria,
                                                            'productos'=>$productos,
                                                            'loged'=>$loged,
                                                            'carrito'=>$carrito,
                                                            'admin'=>$admin
        ]);
    }
    /**
     * @Route("/producto/{producto_id}", name="producto", requirements={"producto_id": "\d+"}, methods={"GET"})
     */
    public function productoView(Request $request, $producto_id)
    {

        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository("AppBundle:Categorias")->findAll();
        $producto = $em->getRepository("AppBundle:Producto")->findOneBy(['producto_id'=>$producto_id]);
        
        $elementos_disponibles = $em->getRepository("AppBundle:Elementos")->elementosDisponibles($producto_id);

        $a=0;
        $disponible = false;
        foreach($elementos_disponibles as $e){
            $a++;
        }
        if($a > 0){
            $disponible = true;
        }
        
        $session = $this->get('session');
        $cliente = false;
        $empleado = false;
        
        $idUsuarios = $session->get('user');
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

        if($user != null){
            if($user->getDatosClientes() != null ){
                $cliente = true;
            }
            else{
                $empleado = true;
            }
        }        

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

        return $this->render('default/producto.html.twig', ['categorias'=>$categorias,
                                                            'producto'=>$producto,
                                                            'disponible'=>$disponible,
                                                            'loged'=>$loged,
                                                            'carrito'=>$carrito,
                                                            'admin'=>$admin,
                                                            'cliente'=>$cliente,
                                                            'empleado'=>$empleado
        ]);
    }
    /**
     * @Route("/producto", name="producto_post", methods={"POST"})
     */    
    public function productoPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $producto_id = $request->request->get('producto_id');
        $carrito = $request->request->get('carrito');

        // Carrito building del user
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);
        
        $carrito_cliente  = $user->getDatosClientes()->getCarritos();
        
        foreach($carrito_cliente as $c){
            if($c->getEstado() == 'building'){
                $carrito_building = $c;
            }
        }
        
        if($carrito){ // if session iniciada y es cliente (luego tiene carrito)

            $elementos_disponibles = $em->getRepository("AppBundle:Elementos")->elementosDisponibles($producto_id);
            
            // Elemento a añadir al carrito building del cliente
            $elemento_disponible = $elementos_disponibles[0];
            
            // Elemento nuevo
            $carrito_building->addElemento($elemento_disponible);
            $elemento_disponible->addCarrito($carrito_building);

            $em->persist($carrito_building);
            $em->persist($elemento_disponible);
            $em->flush();

            return $this->redirectToRoute('carrito');
        }
        else{
            return $this->redirectToRoute('login');
        }
    }
    /**
     * @Route("/quienes-somos", name="quienes-somos")
     */
    public function quienesView(Request $request)
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
        

        return $this->render('default/quienes-somos.html.twig', ['categorias'=>$categorias,
                                                                 'loged'=>$loged,
                                                                 'carrito'=>$carrito,
                                                                 'admin'=>$admin
        ]);

    }
    /**
     * @Route("/tiendas", name="tiendas")
     */
    public function tiendasView(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository("AppBundle:Categorias")->findAll();
        $tiendas = $em->getRepository("AppBundle:Tiendas")->findAll();

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
        
        return $this->render('default/tiendas.html.twig', [ 'tiendas'=>$tiendas,
                                                            'categorias'=>$categorias,
                                                            'loged'=>$loged,
                                                            'carrito'=>$carrito,
                                                            'admin'=>$admin
        ]);

    }
    /**
     * @Route("/ficha-tienda/{tiendas_id}", name="ficha-tienda", requirements={"tiendas_id": "\d+"})
     */
    public function fichaTiendaView(Request $request, $tiendas_id)
    {

        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository("AppBundle:Categorias")->findAll();
        $tienda = $em->getRepository("AppBundle:Tiendas")->findOneBy(['tiendas_id'=>$tiendas_id]);

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


        return $this->render('default/ficha-tienda.html.twig', ['categorias'=>$categorias,
                                                                'tienda'=>$tienda,
                                                                'loged'=>$loged,
                                                                'carrito'=>$carrito,
                                                                'admin'=>$admin
        ]);
    }
    /**
     * @Route("/promos", name="promos")
     */
    public function promosView(Request $request)
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
        
        return $this->render('default/promos.html.twig', [ 'categorias'=>$categorias,
                                                            'loged'=>$loged,
                                                            'carrito'=>$carrito,
                                                            'admin'=>$admin
        ]);

    }
    /**
     * @Route("/registro", name="registro", methods={"GET"})
     */
    public function registroView(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository("AppBundle:Categorias")->findAll();
        $tiendas = $em->getRepository("AppBundle:Tiendas")->findAll();

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
        
        return $this->render('default/registro.html.twig', ['tiendas'=>$tiendas,
                                                            'categorias'=>$categorias,
                                                            'loged'=>$loged,
                                                            'carrito'=>$carrito,
                                                            'admin'=>$admin
        ]);

    }
    /**
     * @Route("/registro", name="registro_post", methods={"POST"})
     */    
    public function registroPostAction(Request $request, SessionInterface $session)
    {
        $em = $this->getDoctrine()->getManager();

        $dni = $request->request->get('dni');
        $email = $request->request->get('repetir_email');
        $password = $request->request->get('repetir_password');
        $username = $request->request->get('nombre_usuario');
        $nombre = $request->request->get('nombre');
        $apellidos = $request->request->get('apellidos');
        $tel = $request->request->get('telefono1');
        $dir = $request->request->get('direccion1');
        $tienda = $request->request->get('tienda_id');
        
        //Comprobar por dni y email si ya existe el cliente, si no existe lo registra y si existe, no lo registra y muestra mensaje.
        $dni_email_yaRegistrado = $em->getRepository("AppBundle:Usuarios")->comprobar_dni_email_clientes($dni, $email);

        if($dni_email_yaRegistrado){
            return $this->redirectToRoute('error');
        }
        else{
            
            //Registrar al cliente
            $empleado = 0;
            $password = md5($password);
            
            //Registrar al Cliente - (Usuario)
            $new_user = new \AppBundle\Entity\Usuarios();
            $new_user->setIsEmpleado($empleado);
            $new_user->setUsername($username);
            $new_user->setNombre($nombre);
            $new_user->setApellidos($apellidos);
            $new_user->setPassword($password);
            //$new_user->setFechaCreacion((new DateTime("now"))->format('Y-m-d H:i:s'));
            //$new_user->setFechaModificacion((new DateTime("now"))->format('Y-m-d H:i:s'));
            $new_user->setDni($dni);
            $new_user->setEmail($email);
            

            $new_client = new \AppBundle\Entity\Clientes();
            $new_client->setTelefono($tel);
            $new_client->setDireccion_facturacion($dir);
            $new_client->setTienda($tienda);
            $new_client->setSaldo(0);
            $new_client->setPuntos(0);
            
            $new_user->addDatosCliente($new_client);
            $new_client->setUsuarios($new_user);
                
            $em->persist($new_user);
            $em->persist($new_client);
            $em->flush();
            

            return $this->redirectToRoute('login'); //Registrado
        }
        
    }
    /**
     * @Route("/error", name="error")
     */
    public function errorView(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository("AppBundle:Categorias")->findAll();
        $productos = $em->getRepository("AppBundle:Producto")->findAll();

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
        
        return $this->render('default/error.html.twig', ['categorias'=>$categorias,
                                                         'productos'=>$productos,
                                                         'loged'=>$loged,
                                                         'carrito'=>$carrito,
                                                         'admin'=>$admin
        ]);

    }
}
