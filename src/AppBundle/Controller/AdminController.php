<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * @Route("/areaAdministracion", name="areaAdministracion")
     */
    public function areaAdministracionView(Request $request)
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
        

        return $this->render('areaAdmin/area-administracion.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin
        ]);
    }
    /**
     * @Route("/gestion-catalogo-admin", name="gestion-catalogo-admin")
     */
    public function gestionCatalogoAdminView(Request $request)
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

        return $this->render('areaAdmin/gestion-catalogo-admin.html.twig', ['categorias'=>$categorias,
                                                                                'loged'=>$loged,
                                                                                'carrito'=>$carrito,
                                                                                'admin'=>$admin,
                                                                                'user'=>$user
        ]);
    }
    /**
     * @Route("/adquirir-productos", name="adquirir-productos")
     */
    public function adquirirProductosView(Request $request)
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
        
        $productos  = $em->getRepository("AppBundle:Producto")->findAll();

        return $this->render('areaAdmin/adquirir-productos.html.twig', ['categorias'=>$categorias,
                                                                        'loged'=>$loged,
                                                                        'carrito'=>$carrito,
                                                                        'admin'=>$admin,
                                                                        'productos'=>$productos
        ]);
    }
    /**
     * @Route("/adquirir-elementos-producto/{producto_id}", name="adquirir-elementos-producto", requirements={"producto_id": "\d+"}, methods={"GET"})
     */
    public function adquirirElementosView(Request $request, $producto_id)
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
        
        $tiendas = $em->getRepository("AppBundle:Tiendas")->findAll();
        $producto = $em->getRepository("AppBundle:Producto")->findOneBy(['producto_id'=>$producto_id]);
        

        return $this->render('areaAdmin/adquirir-elementos-producto.html.twig', [ 'categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'producto'=>$producto,
                                                             'tiendas'=>$tiendas,
        ]);
    }
    /**
     * @Route("/adquirir-elementos-producto", name="adquirir-elementos-producto_post", methods={"POST"})
     */
    public function adquirirElementosProductoPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $producto_id = $request->request->get('producto_id');
        $tienda_asignada = $request->request->get('tienda_asignada');
        $elementos_add = $request->request->get('elementos_add');

        // Producto del que queremos añadir elementos
        $product = $em->getRepository("AppBundle:Producto")->find($producto_id);

        // Tienda a la que queremos añadir los melementos
        $tienda = $em->getRepository("AppBundle:Tiendas")->find($tienda_asignada);

        //Añadir elementos de el producto y tienda asignados
        $i=0;
        while($i < $elementos_add){

                //Código barras - cadena formada por la concatenación numeros "01234" del $i del bucle, el producto_id + id_tienda + YZ
                $codigo_barras = "01234".$i.$producto_id.$tienda_asignada."YZ";

                //Registrar nuevos elementos
                $new_element = new \AppBundle\Entity\Elementos();
                $new_element->setCodigoBarras($codigo_barras);
                //$new_element->setFechaCreacion(new DateTime("now"));
                //$new_element->setFechaModificacion(new DateTime("now"));
                $new_element->setProducto($product);
                $new_element->setTienda($tienda);


                $product->addElemento($new_element);
                $tienda->addElemento($new_element);


                $em->persist($product);
                $em->persist($tienda);


                $em->persist($new_element);
                $em->flush();

            echo $i++;
        }
        return $this->redirectToRoute('gestion-catalogo-admin');        
    }   
    /**
     * @Route("/alta-tienda", name="alta-tienda", methods={"GET"})
     */
    public function altaTiendaView(Request $request)
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
        

        return $this->render('areaAdmin/alta-tienda.html.twig', ['categorias'=>$categorias,
                                                                        'loged'=>$loged,
                                                                        'carrito'=>$carrito,
                                                                        'admin'=>$admin,
        ]);
    }
    /**
     * @Route("/alta-tienda", name="alta-tienda_post", methods={"POST"})
     */    
    public function addCategoriaPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get('session');
        $idUsuarios = $session->get('user');
        
        $nombre_tienda = $request->request->get('nombre_tienda');
        $dir = $request->request->get('direccion1');
        $tel = $request->request->get('telefono1');
        $email = $request->request->get('repetir_email');
        $nombre = $request->request->get('nombre');

        //Comprobar si tienda ya existe
        $tienda_yaRegistrada = $em->getRepository("AppBundle:Tiendas")->comprobar_tienda($nombre_tienda);

        //Si tienda ya existe se redirige
        if($tienda_yaRegistrada){
            return $this->redirectToRoute('error');
        }
        else{
            //Ruta mapa e imagen
            $href = "";
            $img = "images/mapa_Generico.jpg";

            //Registrar nueva tienda
            $new_shop = new \AppBundle\Entity\Tiendas();
            $new_shop->setNombre($nombre_tienda);
            $new_shop->setHref($href);
            $new_shop->setImg($img);
            $new_shop->setCalle($dir);
            $new_shop->setTel($tel);
            $new_shop->setEmail($email);
            $new_shop->setResponsable($nombre);
            $new_shop->setVisible(1);
                
            $em->persist($new_shop);
            $em->flush();

            return $this->redirectToRoute('gestion-catalogo-admin'); 
        }
    }
    /**
     * @Route("/gestion-empleados", name="gestion-empleados")
     */
    public function gestionEmpleadosView(Request $request)
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
        

        return $this->render('areaAdmin/gestion-empleados.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin
        ]);
    }
    /**
     * @Route("/alta-empleado", name="alta-empleado", methods={"GET"})
     */
    public function altaEmpleadoView(Request $request)
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
        
        $tiendas = $em->getRepository("AppBundle:Tiendas")->findAll();

        return $this->render('areaAdmin/alta-empleado.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'tiendas'=>$tiendas
        ]);
    }
    /**
     * @Route("/alta-empleado", name="alta-empleado_post", methods={"POST"})
     */    
    public function altaEmpleadoPostAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager(); 
        
        $dni = $request->request->get('dni');
        $email = $request->request->get('repetir_email');
        $password = $request->request->get('repetir_password');
        $nombre = $request->request->get('nombre');
        $apellidos = $request->request->get('apellidos');
        $tienda_asignada = $request->request->get('tienda_asignada');
        $cargo_tienda = $request->request->get('cargo_tienda');
        
        
        //Comprobar por dni y email si ya existe el empleado, si no existe lo registra y si existe, no lo registra y muestra mensaje.
        $dni_email_yaRegistrado = $em->getRepository("AppBundle:Usuarios")->comprobar_dni_email_empleados($dni, $email);

        //Si empleado ya existe se redirige
        if($dni_email_yaRegistrado){
            return $this->redirectToRoute('error');
        }
        else{
            
            try {
                // Undefined | Multiple Files | $_FILES Corruption Attack
                // If this request falls under any of them, treat it invalid.
                if (
                    !isset($_FILES['archivo1']['error']) ||
                    is_array($_FILES['archivo1']['error'])
                ) {
                    throw new RuntimeException('Invalid parameters.');
                }
           
                // Check $_FILES['archivo1']['error'] value.
                switch ($_FILES['archivo1']['error']) {
                    case UPLOAD_ERR_OK:
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        throw new RuntimeException('No file sent.');
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        throw new RuntimeException('Exceeded filesize limit.');
                    default:
                        throw new RuntimeException('Unknown errors.');
                }
           
                // You should also check filesize here. 
                if ($_FILES['archivo1']['size'] > 2*1024*1024) {
                    throw new RuntimeException('Exceeded filesize limit.');
                }
           
                // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
                // Check MIME Type by yourself.
                /*$finfo = new finfo(FILEINFO_MIME_TYPE);
                $mimetype = $finfo->file($_FILES['archivo1']['tmp_name']);
                if (false === $ext = array_search(
                    $mimetype,
                    array(
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif',
                    ),
                    true
                )) {
                    throw new RuntimeException('Invalid file format.');
                }*/
                $mimetype = 'image/jpeg';
           
                // You should name it uniquely.
                // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
                // On this example, obtain safe unique name from its binary data.
                if( !is_dir('../../ampps/appData4/datos/empleados/files') ) {
                    mkdir('../../ampps/appData4/datos/empleados/files',0777,true);
                }
        
                $id = sha1_file($_FILES['archivo1']['tmp_name']);
                $filename = sprintf('../../ampps/appData4/datos/empleados/files/%s',$id);
                
                $existe = false;

                // Leer todos los files de la tabla - empleados_data y si existe no se vuelve a subir el archivo
                $users = $em->getRepository("AppBundle:Usuarios")->findAll();
                $archivos = $em->getRepository("AppBundle:Empleados")->findAll();
               
                foreach($archivos as $a){
                    if($a->getFotoId() == $id){
                        $existe = true;
                        break;
                    }
                }

                // FJP: Esta parte (subida fisica) hay que obviarla si ya esta 
                // subido el archivo
                            
                if (!$existe && !move_uploaded_file(
                    $_FILES['archivo1']['tmp_name'],
                    $filename
                )) {
                    throw new RuntimeException('Failed to move uploaded file.');
                }
        
                // FJP: Esta parte (subida logica) hay que obviarla en aplicaciones de 1 usuario
                // si archivo ya lo subió. Si hay varios usuarios si se hace porque
                // puede que varios usuarios suban el mismo archivo y hay que registrarlo

            } catch (RuntimeException $e) {
                echo $e->getMessage();
                exit;
            }

            //Registrar nuevo empleado            
            $empleado = 1;
            $password = md5($password);
            
            //Registrar el empleado - (Usuario_data)
            $new_user = new \AppBundle\Entity\Usuarios();
            $new_user->setIsEmpleado($empleado);
            $new_user->setNombre($nombre);
            $new_user->setApellidos($apellidos);
            $new_user->setUsername(null);
            $new_user->setDni($dni);
            $new_user->setEmail($email);
            $new_user->setPassword($password);
            //$new_user->setFechaCreacion(new DateTime("now"));
            //$new_user->setFechaModificacion(new DateTime("now"));
            
            // Registrar el empleado - (Empleado_data)
            $new_empleado = new \AppBundle\Entity\Empleados();
            $new_empleado->setTiendasId($tienda_asignada);
            $new_empleado->setCargo($cargo_tienda);
            $new_empleado->setActivo(1);
            $new_empleado->setFotoId($id);
            $new_empleado->setFotoNombre($_FILES['archivo1']['name']);
            $new_empleado->setFotoTipo($mimetype);
            $new_empleado->setFotoSize($_FILES['archivo1']['size']);
            $new_empleado->setFotoPath($filename);

            $new_user->addEmpleado($new_empleado);
            $new_empleado->setUsuarios($new_user);
                
            $em->persist($new_user);
            $em->persist($new_empleado);
            $em->flush();


            return $this->redirectToRoute('areaAdministracion');
        }
    }
    /**
     * @Route("/editar-empleado", name="editar-empleado")
     */
    public function editarEmpleadoView(Request $request)
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
        
        $is_empleado = 1;
        $users = $em->getRepository("AppBundle:Usuarios")->findBy(['is_empleado'=>$is_empleado]);


        return $this->render('areaAdmin/editar-empleado.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'users'=>$users
        ]);
    }
    /**
     * @Route("/editar-datos-empleados/{idUsuarios}", name="editar-datos-empleados", requirements={"idUsuarios": "\d+"}, methods={"GET"})
     */
    public function editarDatosEmpleadosView(Request $request, $idUsuarios)
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
        
        $tiendas = $em->getRepository("AppBundle:Tiendas")->findAll();
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);

        return $this->render('areaAdmin/editar-datos-empleados.html.twig', [ 'categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'user'=>$user,
                                                             'tiendas'=>$tiendas
        ]);
    }
    /**
     * @Route("/editar-datos-empleados", name="editar-datos-empleados_post", methods={"POST"})
     */    
    public function editarDatosEmpleadosPostAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager(); 
        
        $idUsuarios = $request->request->get('idUsuarios');
        $nombre = $request->request->get('nombre_cambios');
        $apellidos = $request->request->get('apellidos_cambios');
        $cargo_tienda = $request->request->get('cargo_tienda_cambios');
        $tienda_asignada = $request->request->get('tienda_asignada_cambios');
        
        
        //Editar datos-Usuario
        $user = $em->getRepository("AppBundle:Usuarios")->findOneBy(['idUsuarios'=>$idUsuarios]);
        $user->setNombre($nombre);
        $user->setApellidos($apellidos);

        //Editar datos-Empleado
        $empleado = $em->getRepository("AppBundle:Empleados")->findOneBy(['idUsuarios'=>$idUsuarios]);
        $empleado->setCargo($cargo_tienda);
        $empleado->setTiendasId($tienda_asignada);
            
        $em->persist($user);
        $em->persist($empleado);
        $em->flush();

        return $this->redirectToRoute('gestion-empleados');
        
    }
    /**
     * @Route("/baja-empleado", name="baja-empleado", methods={"GET"})
     */
    public function bajaEmpleadoView(Request $request)
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
        
        $is_empleado = 1;
        $users = $em->getRepository("AppBundle:Usuarios")->findBy(['is_empleado'=>$is_empleado]);

        return $this->render('areaAdmin/baja-empleado.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'users'=>$users
        ]);
    }
    /**
     * @Route("/baja-empleado", name="baja-empleado_post", methods={"POST"})
     */    
    public function bajaEmpleadoPostAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager(); 
        
        $numero_empleado = $request->request->get('numero_empleado');
        
        if($numero_empleado != 1){
            
            //Dar de baja empleado
            $emp = $em->getRepository("AppBundle:Empleados")->find($numero_empleado);
            $emp->setActivo(0);
                
            $em->persist($emp);
            $em->flush();
        }
        return $this->redirectToRoute('gestion-empleados');
        
    }
    /**
     * @Route("/listado-empleados", name="listado-empleados")
     */
    public function listadoEmpleadoView(Request $request)
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
        
        $is_empleado = 1;
        $users = $em->getRepository("AppBundle:Usuarios")->findBy(['is_empleado'=>$is_empleado]);


        return $this->render('areaAdmin/listado-empleados.html.twig', ['categorias'=>$categorias,
                                                             'loged'=>$loged,
                                                             'carrito'=>$carrito,
                                                             'admin'=>$admin,
                                                             'users'=>$users
        ]);
    }
}