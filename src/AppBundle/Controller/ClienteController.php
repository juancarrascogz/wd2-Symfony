<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteController extends Controller
{
    /**
     * @Route("/areaCliente", name="areaCliente")
     */
    public function areaClienteView(Request $request)
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
        
        $idUsuarios = $session->get('user');
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

        return $this->render('areaCliente/area-cliente.html.twig', ['categorias'=>$categorias,
                                                                    'loged'=>$loged,
                                                                    'carrito'=>$carrito,
                                                                    'admin'=>$admin,
                                                                    'user'=>$user
        ]);
    }
    /**
     * @Route("/mis-datos", name="mis-datos", methods={"GET"})
     */
    public function misDatosView(Request $request)
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

        $idUsuarios = $session->get('user');
        $cliente_data  = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);


        return $this->render('areaCliente/mis-datos.html.twig', [ 'categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'cliente_data'=>$cliente_data
        ]);
    }
    /**
     * @Route("/mis-datos", name="mis-datos_post", methods={"POST"})
     */    
    public function misDatosPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        
        $username = $request->request->get('nombre_usuario_cambios');
        $nombre = $request->request->get('nombre_cambios');
        $apellidos = $request->request->get('apellidos_cambios');
        $tel = $request->request->get('telefono_cambios');
        $dir = $request->request->get('direccion_cambios');


        //Editar datos-Usuario
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]); 
        $user->setUsername($username);
        $user->setNombre($nombre);
        $user->setApellidos($apellidos);

        //Editar datos-Cliente
        $cliente = $em->getRepository("AppBundle:Clientes")->findOneBy(['idUsuarios'=>$idUsuarios]);
        $cliente->setTelefono($tel);
        $cliente->setDireccion_facturacion($dir);
            
        $em->persist($user);
        $em->persist($cliente);
        $em->flush();


        return $this->redirectToRoute('areaCliente');
    }
    /**
     * @Route("/mis-datos-change-password", name="mis-datos-change-password", methods={"GET"})
     */
    public function misDatosChangePasswordView(Request $request)
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

        return $this->render('areaCliente/mis-datos-change-password.html.twig', [ 'categorias'=>$categorias,
                                                                            'loged'=>$loged,
                                                                            'carrito'=>$carrito,
                                                                            'admin'=>$admin
        ]);
    }
    /**
     * @Route("/mis-datos-change-password", name="mis-datos-change-password_post", methods={"POST"})
     */    
    public function misDatosChangePasswordPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        
        $password = $request->request->get('repetir_password_cambios');

        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);
        $password = md5($password); 
        $user->setPassword($password);

        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('areaCliente');
    }
    /**
     * @Route("/metodos-pago", name="metodos-pago")
     */
    public function metodosPagoView(Request $request)
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

        return $this->render('areaCliente/metodos-pago.html.twig', [ 'categorias'=>$categorias,
                                                                    'loged'=>$loged,
                                                                    'carrito'=>$carrito,
                                                                    'admin'=>$admin
        ]);
    }
    /**
     * @Route("/tus-promos", name="tus-promos")
     */
    public function tusPromosView(Request $request)
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

        $idUsuarios = $session->get('user');
        $user  = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);


        return $this->render('areaCliente/tus-promos.html.twig', [ 'categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'user'=>$user
        ]);
    }
    /**
     * @Route("/monedero", name="monedero", methods={"GET"})
     */
    public function monederoView(Request $request)
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

        $idUsuarios = $session->get('user');
        $user  = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);


        return $this->render('areaCliente/monedero.html.twig', [ 'categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'user'=>$user
        ]);
    }
    /**
     * @Route("/monedero", name="monedero_post", methods={"POST"})
     */    
    public function monederoPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        
        $saldo_agregado = $request->request->get('saldo_agregado');

        //Editar datos-Cliente -> Añadir saldo
        $cliente = $em->getRepository("AppBundle:Clientes")->findOneBy(['idUsuarios'=>$idUsuarios]);
        $saldo_actual = $cliente->getSaldo();
        $nuevo_saldo = $saldo_actual + $saldo_agregado;
        $cliente->setSaldo($nuevo_saldo);

        $em->persist($cliente);
        $em->flush();
        
        return $this->redirectToRoute('monedero');
    }
    /**
     * @Route("/mis-pedidos", name="mis-pedidos")
     */
    public function misPedidosView(Request $request)
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

        $idUsuarios = $session->get('user');
        
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);
        $carrito_cliente  = $user->getDatosClientes()->getCarritos();
    
        foreach($carrito_cliente as $c){
            if($c->getEstado() == 'finish' && $c->getEntregado() == 0){
                $elementos = $c->getElementos();
                $carrito_pendiente = $c->getProductos();
            }
            else if($c->getEstado() == 'finish' && $c->getEntregado() == 1){
                $elementos = $c->getElementos();
                $carrito_entregado = $c->getProductos();
            }
        }


        return $this->render('areaCliente/mis-pedidos.html.twig', [ 'categorias'=>$categorias,
                                                                    'loged'=>$loged,
                                                                    'carrito'=>$carrito,
                                                                    'admin'=>$admin,
                                                                    'user'=>$user,
                                                                    'carrito_pendiente'=>$carrito_pendiente,
                                                                    'carrito_entregado'=>$carrito_entregado
        ]);
    }
    /**
     * @Route("/carrito", name="carrito", methods={"GET"})
     */
    public function carritoView(Request $request)
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

        $idUsuarios = $session->get('user');
        
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);
        
        $carrito_cliente  = $user->getDatosClientes()->getCarritos();
    
        foreach($carrito_cliente as $c){
            if($c->getEstado() == 'building'){
                $elementos = $c->getElementos();
                $carrito_building = $c->getProductos();
            }
        }

        $total_articulos = 0;
        $total_carrito = 0;
        $total_elementos = 0;
        foreach($elementos as $ele){
            $total_articulos++;
            $total_carrito += $ele->getProducto()->getPrecio();
            $total_elementos++;
        }
        $vacio = true;
        if($total_elementos > 0){
            $vacio = false;
        }
        
        return $this->render('areaCliente/carrito.html.twig', ['categorias'=>$categorias,
                                                               'loged'=>$loged,
                                                               'carrito'=>$carrito,
                                                               'admin'=>$admin,
                                                               'user'=>$user,
                                                               'elementos'=>$elementos,
                                                               'total_articulos'=>$total_articulos,
                                                               'total_carrito'=>$total_carrito,
                                                               'vacio'=>$vacio
        ]);
    }
    /**
     * @Route("/carrito-eliminar-producto", name="carrito_eliminar_producto_post", methods={"POST"})
     */
    public function carritoEliminarProductoPostAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $id_elemento = $request->request->get('id_elemento');
       
        // Carrito building
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

        $carrito_cliente  = $user->getDatosClientes()->getCarritos();

        foreach($carrito_cliente as $c){
            if($c->getEstado() == 'building'){
                $carrito_building = $c;
            }
        }

        // Elemento a eliminar del carrito building
        $elemento = $em->getRepository("AppBundle:Elementos")->findOneBy(['id_elemento'=>$id_elemento]);
     
        //echo $carrito_building->getIdCarrito().' '.$elemento->getIdElemento(); exit;

        $carrito_building->getElementos()->removeElement($elemento);
        $elemento->getCarritos()->removeElement($carrito_building);

        $em->persist($elemento);
        $em->persist($carrito_building);

        $em->flush();

        return $this->redirectToRoute('carrito');
    }
    /**
     * @Route("/carrito-eliminar-productos", name="carrito_eliminar_productos_post", methods={"POST"})
     */
    public function carritoEliminarProductosPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

        // Carrito building
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

        $carrito_cliente  = $user->getDatosClientes()->getCarritos();

        foreach($carrito_cliente as $c){
            if($c->getEstado() == 'building'){
                $carrito_building = $c;
            }
        }
        
        // Eliminar elemento del carrito building
        $carrito_building->setElementos(null);
        
        $em->persist($carrito_building);
        $em->flush();

        return $this->redirectToRoute('carrito');
        
    }
    /**
     * @Route("/finalizar-compra", name="finalizar-compra", methods={"GET"})
     */
    public function finalizarCompraView(Request $request)
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

        $idUsuarios = $session->get('user');
        
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);
        $carrito_cliente  = $user->getDatosClientes()->getCarritos();
    
        foreach($carrito_cliente as $c){
            if($c->getEstado() == 'building'){
                $elementos = $c->getElementos();
                $carrito_building = $c->getProductos();
            }
        }
        $session->set('ultima_compra', $elementos);

        $total_articulos = 0;
        $total_carrito = 0;
        foreach($carrito_building as $producto){
            $total_articulos++;
            $total_carrito += $producto->getPrecio();
        }

        $total_carrito_envio = $total_carrito + 4.99;
        
        $msg = null;
        return $this->render('areaCliente/finalizar-compra.html.twig', ['categorias'=>$categorias,
                                                               'loged'=>$loged,
                                                               'carrito'=>$carrito,
                                                               'admin'=>$admin,
                                                               'user'=>$user,
                                                               'elementos'=>$elementos,
                                                               'total_articulos'=>$total_articulos,
                                                               'total_carrito'=>$total_carrito,
                                                               'total_carrito_envio'=>$total_carrito_envio,
                                                               'msg'=>$msg
                                                            

        ]);
    }
    /**
     * @Route("/finalizar-compra-tienda", name="finalizar-compra_tienda_post", methods={"POST"})
     */    
    public function finalizarCompraTiendaPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->get('session');
        $session->set('envio_domicilio', false);
        $idUsuarios = $session->get('user');
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

        $total_carrito = $request->request->get('total_carrito');
        $saldo = $user->getDatosClientes()->getSaldo();

        if( $saldo >= $total_carrito){

            // Carrito finish y entregado = 0 (pendiente de entrega)
            $session = $this->get('session');
            $idUsuarios = $session->get('user');
            $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

            $carrito_cliente  = $user->getDatosClientes()->getCarritos();

            foreach($carrito_cliente as $c){
                if($c->getEstado() == 'finish' && $c->getEntregado() == 0){
                    $carrito_finish = $c;
                }
            }

            // Elementos del carrito building (compra ha realizar) / Carrito Building del cliente
            $session = $this->get('session');
            $idUsuarios = $session->get('user');
            $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

            $carrito_cliente  = $user->getDatosClientes()->getCarritos();

            foreach($carrito_cliente as $c){
                if($c->getEstado() == 'building'){
                    $carrito_building = $c;
                }
            }
        
            // Elementos que ya estan en el carrito building
            $elementos_del_carrito = $carrito_building->getElementos();

            foreach($elementos_del_carrito as $e){ 
                $id = $e->getIdElemento();
                $elemento_add = $em->getRepository("AppBundle:Elementos")->findOneBy(['id_elemento'=>$id]);
                $carrito_finish->addElemento($elemento_add);
                $elemento_add->addCarrito($carrito_finish);
            }
            // Eliminar elemento del carrito building
            $carrito_building->setElementos(null);

            //Restar saldo del monedero del usuario
            $nuevo_saldo = $saldo - $total_carrito;
            $cliente = $user->getDatosClientes();

            $cliente->setSaldo($nuevo_saldo);

            $em->persist($carrito_finish);
            $em->persist($elemento_add);
            $em->persist($carrito_building);
            $em->persist($cliente);
            $em->flush();

            return $this->redirectToRoute('compra-realizada');
        }
        else{
            $msg = "No dispones de ".$total_carrito."€ en tu cuenta. (Recogida en tienda) ";

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
            $idUsuarios = $session->get('user');
            
            $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);
            $carrito_cliente  = $user->getDatosClientes()->getCarritos();
        
            foreach($carrito_cliente as $c){
                if($c->getEstado() == 'building'){
                    $elementos = $c->getElementos();
                    $carrito_building = $c->getProductos();
                }
            }

            $total_articulos = 0;
            $total_carrito = 0;
            foreach($carrito_building as $producto){
                $total_articulos++;
                $total_carrito += $producto->getPrecio();
            }

            $total_carrito_envio = $total_carrito + 4.99;

            return $this->render('areaCliente/finalizar-compra.html.twig', ['categorias'=>$categorias,
                                                               'loged'=>$loged,
                                                               'carrito'=>$carrito,
                                                               'admin'=>$admin,
                                                               'user'=>$user,
                                                               'elementos'=>$elementos,
                                                               'total_articulos'=>$total_articulos,
                                                               'total_carrito'=>$total_carrito,
                                                               'total_carrito_envio'=>$total_carrito_envio,
                                                               'msg'=>$msg
                                                            

            ]);
        }
    }
    /**
     * @Route("/finalizar-compra-envio", name="finalizar-compra_envio_post", methods={"POST"})
     */
    public function finalizarCompraEnvioPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->get('session');
        $session->set('envio_domicilio', true);
        $idUsuarios = $session->get('user');
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

        $total_carrito_envio = $request->request->get('total_carrito_envio');
        $saldo = $user->getDatosClientes()->getSaldo();

        if( $saldo >= $total_carrito_envio){

            // Carrito finish y entregado = 0 (pendiente de entrega)
            $session = $this->get('session');
            $idUsuarios = $session->get('user');
            $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

            $carrito_cliente  = $user->getDatosClientes()->getCarritos();

            foreach($carrito_cliente as $c){
                if($c->getEstado() == 'finish' && $c->getEntregado() == 0){
                    $carrito_finish = $c;
                }
            }

            // Elementos del carrito building (compra ha realizar) / Carrito Building del cliente
            $session = $this->get('session');
            $idUsuarios = $session->get('user');
            $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

            $carrito_cliente  = $user->getDatosClientes()->getCarritos();

            foreach($carrito_cliente as $c){
                if($c->getEstado() == 'building'){
                    $carrito_building = $c;
                }
            }

            // Elementos que ya estan en el carrito building
            $elementos_del_carrito = $carrito_building->getElementos();

            foreach($elementos_del_carrito as $e){ 
                $id = $e->getIdElemento();
                $elemento_add = $em->getRepository("AppBundle:Elementos")->findOneBy(['id_elemento'=>$id]);
                $carrito_finish->addElemento($elemento_add);
                $elemento_add->addCarrito($carrito_finish);
            }
            // Eliminar elemento del carrito building
            $carrito_building->setElementos(null);

            //Restar saldo del monedero del usuario
            $nuevo_saldo = $saldo - $total_carrito_envio;
            $cliente = $user->getDatosClientes();

            $cliente->setSaldo($nuevo_saldo);

            $em->persist($carrito_finish);
            $em->persist($elemento_add);
            $em->persist($carrito_building);
            $em->persist($cliente);
            $em->flush();

            return $this->redirectToRoute('compra-realizada');
        }
        else{
            $msg = "No dispones de ".$total_carrito_envio."€ en tu cuenta. (Envío a domicilio) ";

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
            $idUsuarios = $session->get('user');
            
            $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);
            $carrito_cliente  = $user->getDatosClientes()->getCarritos();
        
            foreach($carrito_cliente as $c){
                if($c->getEstado() == 'building'){
                    $elementos = $c->getElementos();
                    $carrito_building = $c->getProductos();
                }
            }

            $total_articulos = 0;
            $total_carrito = 0;
            foreach($carrito_building as $producto){
                $total_articulos++;
                $total_carrito += $producto->getPrecio();
            }
            $total_carrito_envio = $total_carrito + 4.99;

            return $this->render('areaCliente/finalizar-compra.html.twig', ['categorias'=>$categorias,
                                                               'loged'=>$loged,
                                                               'carrito'=>$carrito,
                                                               'admin'=>$admin,
                                                               'user'=>$user,
                                                               'elementos'=>$elementos,
                                                               'total_articulos'=>$total_articulos,
                                                               'total_carrito'=>$total_carrito,
                                                               'total_carrito_envio'=>$total_carrito_envio,
                                                               'msg'=>$msg
                                                            

            ]);
        }  
    }
    /**
     * @Route("/compra-realizada", name="compra-realizada")
     */
    public function compraRealizadaView(Request $request)
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

        return $this->render('areaCliente/compra-realizada.html.twig', [ 'categorias'=>$categorias,
                                                                        'loged'=>$loged,
                                                                        'carrito'=>$carrito,
                                                                        'admin'=>$admin
        ]);
    }
    /**
     * @Route("/factura", name="factura", methods={"GET"})
     */
    public function facturaView(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // Datos del cliente
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

        $carrito_cliente  = $user->getDatosClientes()->getCarritos();
        
        foreach($carrito_cliente as $c){
            if($c->getEstado() == 'finish' && $c->getEntregado()==0){
                $elementos = $c->getElementos();
            }
        }

        // Elementos última compra
        $ultima_compra = $session->get('ultima_compra');
        $elementos_comprados = $ultima_compra;

        $subtotal = 0;
        $total = 0;
        foreach($elementos_comprados as $elemento){
            $total += $elemento->getProducto()->getPrecio();
        }
        
        $iva = ($total/100)*21;
        $subtotal = $total - (($total/100)*21);

        $envio_domicilio = $session->get('envio_domicilio');
        $total_envio = null;
        $gastos_envio = null;
        
        if($envio_domicilio){
            $gastos_envio = 4.99;
            $total_envio = $total + $gastos_envio;
        }
        
        return $this->render('areaCliente/factura.html.twig',[  'user'=>$user,
                                                                'subtotal'=>$subtotal,
                                                                'iva'=>$iva,
                                                                'total'=>$total,
                                                                'elementos_comprados'=>$elementos_comprados,
                                                                'gastos_envio'=>$gastos_envio,
                                                                'total_envio'=>$total_envio

        ]);
    }

}//