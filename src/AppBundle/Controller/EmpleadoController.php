<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmpleadoController extends Controller
{
    /**
     * @Route("/areaEmpleado", name="areaEmpleado")
     */
    public function areaEmpleadoView(Request $request)
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

        return $this->render('areaEmpleado/area-empleado.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'user'=>$user
        ]);
    }
    /**
     * @Route("/seccion-tiendas", name="seccion-tiendas")
     */
    public function seccionTiendasView(Request $request)
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
        $tiendas  = $em->getRepository("AppBundle:Tiendas")->findAll();


        return $this->render('areaEmpleado/seccion-tiendas.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'user'=>$user,
                                                             'tiendas'=>$tiendas
        ]);
    }
    /**
     * @Route("/seccion-tienda/{tiendas_id}", name="seccion-tienda", requirements={"tiendas_id": "\d+"})
     */
    public function seccionTiendaView(Request $request, $tiendas_id)
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
        $tienda  = $em->getRepository("AppBundle:Tiendas")->find($tiendas_id);


        return $this->render('areaEmpleado/seccion-tienda.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'user'=>$user,
                                                             'tienda'=>$tienda
        ]);
    }
    /**
     * @Route("/gestion-catalogo", name="gestion-catalogo")
     */
    public function gestionCatalogoView(Request $request)
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

        return $this->render('areaEmpleado/gestion-catalogo.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'user'=>$user
        ]);
    }
    /**
     * @Route("/listado-clientes/{tiendas_id}", name="listado-clientes", requirements={"tiendas_id": "\d+"})
     */
    public function listadoClientesView(Request $request, $tiendas_id)
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
        
        $clientes_tienda  = $em->getRepository("AppBundle:Clientes")->findAll();
        $tienda  = $em->getRepository("AppBundle:Tiendas")->find($tiendas_id);

        return $this->render('areaEmpleado/listado-clientes.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'tienda'=>$tienda,
                                                             'clientes_tienda'=>$clientes_tienda
        ]);
    }
    /**
     * @Route("/pedidos-tienda/{tiendas_id}", name="pedidos-tienda", requirements={"tiendas_id": "\d+"})
     */
    public function pedidosTiendaView(Request $request, $tiendas_id)
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
        
        $tienda  = $em->getRepository("AppBundle:Tiendas")->find($tiendas_id);
        $carritos = $em->getRepository("AppBundle:Carritos")->findAll();
    
        foreach($carritos as $c){
            if($c->getEstado() == "finish" && $c->getEntregado() == 0){
                $elementos_pendientes = $c->getElementos();
            }
        }

        return $this->render('areaEmpleado/pedidos-tienda.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'tienda'=>$tienda,
                                                             'elementos_pendientes'=>$elementos_pendientes
        ]);
    }
    /**
     * @Route("/listado/{tiendas_id}", name="listado", requirements={"tiendas_id": "\d+"})
     */
    public function listadoView(Request $request, $tiendas_id)
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
        
        $tienda  = $em->getRepository("AppBundle:Tiendas")->find($tiendas_id);

        $productos = $em->getRepository("AppBundle:Producto")->findAll();
        $elementos = $em->getRepository("AppBundle:Elementos")->findBy(['tienda'=>$tienda]); 

        return $this->render('areaEmpleado/listado.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'tienda'=>$tienda,
                                                             'productos'=>$productos,
                                                             'elementos'=>$elementos
        ]);
    }
    /**
     * @Route("/trasladar-producto/{producto_id}/{stock}/{tiendas_id}", name="trasladar-producto", requirements={"producto_id","stock","tiendas_id": "\d+"}, methods={"GET"})
     */
    public function trasladarProductoView(Request $request, $producto_id, $stock, $tiendas_id)
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
        
        $tienda = $em->getRepository("AppBundle:Tiendas")->find($tiendas_id);
        $tiendas = $em->getRepository("AppBundle:Tiendas")->findAll();
        $producto = $em->getRepository("AppBundle:Producto")->find($producto_id);

        return $this->render('areaEmpleado/trasladar-producto.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'tienda'=>$tienda,
                                                             'tiendas'=>$tiendas,
                                                             'producto'=>$producto,
                                                             'stock'=>$stock
        ]);
    }
    /**
     * @Route("/trasladar-producto", name="trasladar-producto_post", methods={"POST"})
     */    
    public function trasladarProductoPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        
        $tienda_asignada = $request->request->get('tienda_asignada');
        $stock_trasladar = $request->request->get('stock_trasladar');
        $producto_id = $request->request->get('producto_id');

        $produc = $em->getRepository("AppBundle:Producto")->find($producto_id);
        $elementos = $em->getRepository("AppBundle:Elementos")->findBy(['producto'=>$produc]);
        $shop = $em->getRepository("AppBundle:Tiendas")->find($tienda_asignada);
        
        // Array de los elementos de un producto concreto a trasladar
        $array = array();
        //$array[null];
        foreach($elementos as $e){
                $array[] = $e->getIdElemento();
        }

        // Trasladar productos de tienda actual a nueva tienda destino
        $i=0;
        $stock_trasladar = $stock_trasladar;
        while($i<$stock_trasladar){ 

            $elemento = $em->getRepository("AppBundle:Elementos")->find($array[$i]);
            //$elemento->setFechaModificacion(new DateTime("now")); 

            $shop->addElemento($elemento);
            $elemento->setTienda($shop);
            $produc->addElemento($elemento);
            $elemento->setProducto($produc);

            $em->persist($produc);
            $em->persist($shop);
            $em->persist($elemento);
            $em->flush();

             $i++;
        }

        if($idUsuarios == '1'){
            return $this->redirectToRoute('gestion-catalogo-admin');
        }
        else{
            return $this->redirectToRoute('gestion-catalogo');
        }        
    }
    /**
     * @Route("/add-categoria", name="add-categoria", methods={"GET"})
     */
    public function addCategoriaView(Request $request)
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
        

        return $this->render('areaEmpleado/add-categoria.html.twig', ['categorias'=>$categorias,
                                                                      'loged'=>$loged,
                                                                      'carrito'=>$carrito,
                                                                       'admin'=>$admin
        ]);
    }
    /**
     * @Route("/add-categoria", name="add-categoria_post", methods={"POST"})
     */    
    public function addCategoriaPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        
        $nombre_categoria = $request->request->get('nombre');
        $acronimo = $request->request->get('acronimo');
        $descripcion = $request->request->get('descripcion');

        //Comprobar si categoria ya existe
        $categoria_yaRegistrada = $em->getRepository("AppBundle:Categorias")->comprobar_categoria($nombre_categoria);

        //Si categoria ya existe se redirige
        if($categoria_yaRegistrada){
            if($idUsuarios == '1'){
                return $this->redirectToRoute('error');
            }
            else{
                return $this->redirectToRoute('error');
            }
        }
        else{
            //Registrar nueva categoria
            $categ = new \AppBundle\Entity\Categorias();
            $categ->setCategoria($nombre_categoria);
            //$categ->setFechaCreacion(new DateTime("now"));
            //$categ->setFechaModificacion(new DateTime("now"));
            $categ->setAcronimo($acronimo);
            $categ->setDescripcion($descripcion);
            $categ->setVisible(1);
                
            $em->persist($categ);
            $em->flush();

            if($idUsuarios == '1'){
                return $this->redirectToRoute('gestion-catalogo-admin');
            }
            else{
                return $this->redirectToRoute('gestion-catalogo');
            }
        }
    }
    /**
     * @Route("/editar-categoria", name="editar-categoria")
     */
    public function editarCategoriaView(Request $request)
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
        

        return $this->render('areaEmpleado/editar-categoria.html.twig', ['categorias'=>$categorias,
                                                                      'loged'=>$loged,
                                                                      'carrito'=>$carrito,
                                                                       'admin'=>$admin
        ]);
    }
    /**
     * @Route("/editar-datos-categoria/{id_catg}", name="editar-datos-categoria", requirements={"id_catg": "\d+"}, methods={"GET"})
     */
    public function editarDatosCategoriaView(Request $request, $id_catg)
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

        $categoria = $em->getRepository("AppBundle:Categorias")->findOneBy(['id_catg'=>$id_catg]);
        

        return $this->render('areaEmpleado/editar-datos-categoria.html.twig', ['categorias'=>$categorias,
                                                                                'loged'=>$loged,
                                                                                'carrito'=>$carrito,
                                                                                'admin'=>$admin,
                                                                                'categoria'=>$categoria,
        ]);
    }
    /**
     * @Route("/editar-datos-categoria", name="editar-datos-categoria_post", methods={"POST"})
     */    
    public function editarCategoriaPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        
        $id_catg = $request->request->get('id_catg');
        $nombre_categoria = $request->request->get('nombre_cambios');
        $acronimo = $request->request->get('acronimo_cambios');
        $descripcion = $request->request->get('descripcion_cambios');

        //Comprobar si categoria ya existe
        $categoria_yaRegistrada = $em->getRepository("AppBundle:Categorias")->comprobar_categoria($nombre_categoria);

        //Si categoria ya existe se redirige
        if($categoria_yaRegistrada){
            if($idUsuarios == '1'){
                return $this->redirectToRoute('error');
            }
            else{
                return $this->redirectToRoute('error');
            }
        }
        else{
                //Editar la categoria
                $categ = $em->getRepository("AppBundle:Categorias")->find($id_catg);
                $categ->setCategoria($nombre_categoria);
                //$categ->setFechaModificacion(new DateTime("now"));
                $categ->setAcronimo($acronimo);
                $categ->setDescripcion($descripcion);
                    
                $em->persist($categ);
                $em->flush();

                if($idUsuarios == '1'){
                    return $this->redirectToRoute('gestion-catalogo-admin');
                }
                else{
                    return $this->redirectToRoute('gestion-catalogo');
                }
            }
    }
    /**
     * @Route("/eliminar-categoria", name="eliminar-categoria", methods={"GET"})
     */
    public function eliminarCategoriaView(Request $request)
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
        

        return $this->render('areaEmpleado/eliminar-categoria.html.twig', ['categorias'=>$categorias,
                                                                      'loged'=>$loged,
                                                                      'carrito'=>$carrito,
                                                                       'admin'=>$admin
        ]);
    }
    /**
     * @Route("/eliminar-categoria", name="eliminar-categoria_post", methods={"POST"})
     */    
    public function eliminarCategoriaPostAction(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        
        $numero_categoria = $request->request->get('numero_categoria');
        
        if($numero_categoria != 0 && $numero_categoria != 1){

            //Eliminar la categoria
            $categ = $em->getRepository("AppBundle:Categorias")->find($numero_categoria);
                    
            $em->remove($categ);
            $em->flush();
        }
        if($idUsuarios == '1'){
            return $this->redirectToRoute('gestion-catalogo-admin');
        }
        else{
            return $this->redirectToRoute('gestion-catalogo');
        }
    }
    /**
     * @Route("/add-producto", name="add-producto", methods={"GET"})
     */
    public function addProductoView(Request $request)
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
        

        return $this->render('areaEmpleado/add-producto.html.twig', ['categorias'=>$categorias,
                                                                      'loged'=>$loged,
                                                                      'carrito'=>$carrito,
                                                                       'admin'=>$admin
        ]);
    }
    /**
     * @Route("/add-producto", name="add-producto_post", methods={"POST"})
     */    
    public function addProductoPostAction(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        
        $nombre = $request->request->get('nombre');
        $upfile = $request->request->get('upfile');
        $categoria_asignada = $request->request->get('categoria_asignada');
        $precio = $request->request->get('precio');
        $descripcion = $request->request->get('descripcion');
        $ref = $request->request->get('ref');
        $fabricante = $request->request->get('fabricante');
        $acronimo = $request->request->get('acronimo');

        //Comprobar si producto ya existe
        $producto_yaRegistrada = $em->getRepository("AppBundle:Producto")->comprobar_producto($nombre);

        //Si producto ya existe se redirige
        if($producto_yaRegistrada){
            if($idUsuarios == '1'){
                return $this->redirectToRoute('error');
            }
            else{
                return $this->redirectToRoute('error');
            }
        }
        else{

            $filename = "images/".$upfile;
            $tam = 120;
            $valoracion = 0;
            $destacados = 0;
            $promocion = 0;

            // Categoria seleccionada para el producto
            $categ = $em->getRepository("AppBundle:Categorias")->find($categoria_asignada);

            //Registrar nuevo producto
            $new_product = new \AppBundle\Entity\Producto();
            $new_product->setName($nombre);
            $new_product->setPrecio($precio);
            //$new_product->setFechaCreacion(new DateTime("now"));
            //$new_product->setFechaModificacion(new DateTime("now"));
            $new_product->setDescripcion($descripcion);
            $new_product->setValoracion($valoracion);
            $new_product->setRef($ref);
            $new_product->setFabricante($fabricante);
            $new_product->setDestacados($destacados);
            $new_product->setPromocion($promocion);
            $new_product->setAcronimo($acronimo);

            
            $new_product->setCategorias($categ);
            
            // Registrar imagen del producto
            $new_img = new \AppBundle\Entity\Imagenes();
            $new_img->setImg_g($filename);
            $new_img->setImg_1($filename);
            $new_img->setImg_2($filename);
            $new_img->setImg_3($filename);
            $new_img->setImg_4($filename);
            $new_img->setTam($tam);

            $categ->addProducto($new_product);
            $new_product->addImage($new_img);
            $new_img->setProducto($new_product);
            

            $em->persist($categ);            
            $em->persist($new_product);
            $em->persist($new_img);
            $em->flush();

            if($idUsuarios == '1'){
                return $this->redirectToRoute('gestion-catalogo-admin');
            }
            else{
                return $this->redirectToRoute('gestion-catalogo');
            }
        }
    }
    /**
     * @Route("/editar-producto", name="editar-producto")
     */
    public function editarProductoView(Request $request)
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

        $productos = $em->getRepository("AppBundle:Producto")->findAll();
        

        return $this->render('areaEmpleado/editar-producto.html.twig', ['categorias'=>$categorias,
                                                                      'loged'=>$loged,
                                                                      'carrito'=>$carrito,
                                                                       'admin'=>$admin,
                                                                       'productos'=>$productos,
        ]);
    }
    /**
     * @Route("/editar-datos-producto/{producto_id}", name="editar-datos-producto", requirements={"producto_id": "\d+"}, methods={"GET"})
     */
    public function editarDatosProductoView(Request $request, $producto_id)
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

        $producto = $em->getRepository("AppBundle:Producto")->findOneBy(['producto_id'=>$producto_id]);
        

        return $this->render('areaEmpleado/editar-datos-producto.html.twig', ['categorias'=>$categorias,
                                                                                'loged'=>$loged,
                                                                                'carrito'=>$carrito,
                                                                                'admin'=>$admin,
                                                                                'producto'=>$producto,
        ]);
    }
    /**
     * @Route("/editar-datos-producto", name="editar-datos-producto_post", methods={"POST"})
     */    
    public function editarProductoPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        
        $producto_id = $request->request->get('producto_id');
        $nombre_producto = $request->request->get('nombre_cambios');
        $acronimo = $request->request->get('acronimo_cambios');
        $descripcion = $request->request->get('descripcion_cambios');
        
        $precio = $request->request->get('precio_cambios');
        $ref = $request->request->get('ref_cambios');
        $fabricante = $request->request->get('fabricante_cambios');

        //Comprobar si producto ya existe
        $producto_yaRegistrada = $em->getRepository("AppBundle:Producto")->comprobar_producto($nombre_producto);


        //Si producto ya existe se redirige
        if($producto_yaRegistrada){
            if($idUsuarios == '1'){
                return $this->redirectToRoute('error');
            }
            else{
                return $this->redirectToRoute('error');
            }
        }
        else{

            //Editar producto
            $product = $em->getRepository("AppBundle:Producto")->find($producto_id);
            $product->setAcronimo($acronimo);
            $product->setName($nombre_producto);
            $product->setDescripcion($descripcion);
            $product->setPrecio($precio);
            $product->setRef($ref);
            $product->setFabricante($fabricante);
            //$product->setFechaModificacion(new DateTime("now"));

            $em->persist($product);
            $em->flush();

            if($idUsuarios == '1'){
                return $this->redirectToRoute('gestion-catalogo-admin');
            }
            else{
                return $this->redirectToRoute('gestion-catalogo');
            }
        }      
    }
    /**
     * @Route("/eliminar-producto", name="eliminar-producto", methods={"GET"})
     */
    public function eliminarProductoView(Request $request)
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
        
        $productos = $em->getRepository("AppBundle:Producto")->findAll();

        return $this->render('areaEmpleado/eliminar-producto.html.twig', ['categorias'=>$categorias,
                                                                      'loged'=>$loged,
                                                                      'carrito'=>$carrito,
                                                                       'admin'=>$admin,
                                                                       'productos'=>$productos
        ]);
    }
    /**
     * @Route("/eliminar-producto", name="eliminar-producto_post", methods={"POST"})
     */    
    public function eliminarProductoPostAction(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        
        $numero_producto = $request->request->get('numero_producto');
        
        //Eliminar las imagenes del producto
        $product = $em->getRepository("AppBundle:Producto")->find($numero_producto);
        $images = $em->getRepository("AppBundle:Imagenes")->findOneBy(['producto'=>$product]);
                    
        $em->remove($images);
        $em->flush();
        
        //Eliminar el producto
        $product = $em->getRepository("AppBundle:Producto")->find($numero_producto);
                    
        $em->remove($product);
        $em->flush();

        if($idUsuarios == '1'){
            return $this->redirectToRoute('gestion-catalogo-admin');
        }
        else{
            return $this->redirectToRoute('gestion-catalogo');
        }
    }
    /**
     * @Route("/listado-productos-todas-tiendas", name="listado-productos-todas-tiendas")
     */
    public function listadoProductosTodasTiendasView(Request $request)
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
        
        $productos = $em->getRepository("AppBundle:Tiendas")->datos_elementos_tiendas_get_all();

        return $this->render('areaEmpleado/listado-productos-todas-tiendas.html.twig', ['categorias'=>$categorias,
                                                                                        'loged'=>$loged,
                                                                                        'carrito'=>$carrito,
                                                                                        'admin'=>$admin,
                                                                                        'productos'=>$productos
        ]);
    }
    /**
     * @Route("/pedidos/{idUsuarios}", name="pedidos", requirements={"idUsuarios": "\d+"})
     */
    public function pedidosView(Request $request, $idUsuarios)
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


        return $this->render('areaEmpleado/pedidos.html.twig', [ 'categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'user'=>$user,
                                                             'carrito_pendiente'=>$carrito_pendiente,
                                                             'carrito_entregado'=>$carrito_entregado
        ]);
    }


}